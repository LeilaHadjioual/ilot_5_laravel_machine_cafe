<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::all();

        $data = [
            'ingredients' => $ingredients,
        ];

        return view('back_office.Ingredients.index', $data);
    }

    public function sort($column, $order)
    {
        $ingredients = Ingredient::orderBy($column, $order)->get();

        if ($order == 'asc') {
            $order = 'desc';
            $dir = 'down';
        } else {
            $order = 'asc';
            $dir = 'up';
        }

        $data = [
            'ingredients' => $ingredients,
        ];

        if ($column == 'name') {
            $data['sortName'] = '<a href="/ingredients/sorts/name/' . $order . '">Name <i class="fa fa-sort-' . $dir . '"></i></a>';
        } elseif ($column == 'stock') {
            $data['sortStock'] = '<a href="/ingredients/sorts/stock/' . $order . '">Stock <i class="fa fa-sort-' . $dir . '"></i></a>';

        }

        return view('back_office.Ingredients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_office.Ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ingredient::create(['name' => $request->name, 'stock' => $request->stock, 'color' => $request->color]);
        return redirect('/ingredients');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        $data = [
            'ingredient' => $ingredient->load('boisson'),
            'ratio' => (($ingredient->stock) / ($ingredient->max) * 100),
        ];

        return view('back_office.Ingredients.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        $data = [
            'ingredient' => $ingredient,
            'ratio' => (($ingredient->stock) / ($ingredient->max) * 100)
        ];
        return view('back_office.Ingredients.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $stock = $request->stock * 100 / $ingredient->max;
        $ingredient->name = $request->name;
        $ingredient->stock = $stock;
        $ingredient->color = $request->color;
        $ingredient->save();

        return redirect('/ingredients/' . $ingredient->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->boisson()->detach();
        $ingredient->delete();
        return redirect('/ingredients');
    }
}
