<?php

namespace App\Http\Controllers;

use App\Boisson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoissonsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boissons = Boisson::all();
        $data = [
            'boissons' => $boissons,
        ];
        return view('back_office.boissons.index', $data);
    }

    public function sort($column, $order)
    {
        $boissons = Boisson::orderBy($column, $order)->get();

        if ($order == 'asc') {
            $order = 'desc';
            $dir = 'down';
        } else {
            $order = 'asc';
            $dir = 'up';
        }

        $data = [
            'boissons' => $boissons,
        ];

        if ($column == 'name') {
            $data['sortName'] = '<a href="/boissons/sorts/name/' . $order . '">Name <i class="fa fa-sort-' . $dir . '"></i></a>';
        } elseif ($column == 'price') {
            $data['sortPrice'] = '<a href="/boissons/sorts/price/' . $order . '">Price <i class="fa fa-sort-' . $dir . '"></i></a>';
        }

        return view('back_office.boissons.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back_office.boissons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $boisson = Boisson::create(['name' => $request->name, 'price' => $request->price, 'color' => $request->color]);
        return redirect()->action('RecipesController@edit', ['boisson' => $boisson]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function show(Boisson $boisson)
    {
        $boisson = $boisson->load('sales', 'users', 'ingredients');
        return view('back_office.boissons.show', ['boisson' => $boisson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function edit(Boisson $boisson)
    {
        return view('back_office.boissons.edit', ['boisson' => $boisson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boisson $boisson)
    {
        $boisson->update($request->all());
        return redirect('/boissons/'.$boisson->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boisson $boisson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boisson $boisson)
    {
        $boisson->ingredients()->detach();
        foreach ($boisson->sales as $sale) {
            $sale->boisson()->dissociate();
        }
        $boisson->delete();
        return redirect('/boissons');
    }
}
