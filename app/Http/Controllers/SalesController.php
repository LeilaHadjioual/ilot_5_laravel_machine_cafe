<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSales;
use App\Sale;
use App\Http\Controllers\App\Preparation;
use App\Boisson;
use App\Ingredient;
use App\User;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all()->load('user', 'boisson');
        return view('back_office.sales.index', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        $boissons = Boisson::all()->load('ingredients');

        foreach ($boissons as $key => $boisson) {
            foreach ($boisson->ingredients as $ingredient) {
                if (($ingredient->pivot->quantity) > ($ingredient->stock)) {
                    $boissons->forget($key);
                }
            }
        }

        $data = [
            'boissons' => $boissons,
        ];

        return view('front_office.sales.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(CreateSales $request)
    {
        $coins = json_decode($request['money'], true);
        krsort($coins, SORT_NUMERIC);

        $boisson = Boisson::find(request('id'));

        $preparation = new Preparation($boisson, $coins);

        if ($preparation->enoughMoney) {
            if ($preparation->canMakeMoney) {
                $data = [
                    'boisson_id' => $boisson->id,
                    'user_id' => \Auth::id(),
                    'sugar' => request('selectSucre'),
                    'boisson_name' => $boisson->name,
                    'price' => $boisson->price,
                    'money_user' => $preparation->userMoney,
                    'make_money' => $preparation->makeMoney,
                ];

                foreach ($boisson->ingredients as $ingredient) {
                    $stock = Ingredient::find($ingredient->id);
                    $stock->stock -= $ingredient->pivot->quantity;
                    $stock->save();
                }

                $sugar = Ingredient::find(3);
                $sugar->stock -= request('selectSucre');
                $sugar->save();

                Sale::create($data);
                $preparation->store();


                return redirect()->back()->with(['coinBack' => $preparation->renduCoins, 'anime' => true, 'ingredients' => $boisson->ingredients, 'color' => $boisson->color]);
            } else {
                return redirect()->back()->withErrors('Ne pourra pas rendre la monnaie');
            }
        } else {
            return redirect()->back()->withErrors('Monnaie insuffisante');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function show(User $sale)
    {
        $user = $sale->load('boissons');
        return view('front_office.sales.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale $sale
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Sale $sale)
    {
        //
    }
}
