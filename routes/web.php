<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/sales/create');
});

Route::resource('/sales', 'SalesController', ['only' => [
    'create', 'store'
]]);

Route::middleware('admin')->group(function () {

    Route::get('ingredients/sorts/{column}/{order}', 'IngredientsController@sort');
    Route::resource('ingredients', 'IngredientsController');

    Route::get('boissons/sorts/{column}/{order}', 'BoissonsController@sort');
    Route::resource('boissons', 'BoissonsController');

    Route::resource('recipes', 'RecipesController', ['only' => [
        'edit', 'update', 'destroy'
    ]]);

    Route::resource('/sales', 'SalesController', ['except' => [
        'create', 'store'
    ]]);

    Route::resource('/coins', 'CoinController');

});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
