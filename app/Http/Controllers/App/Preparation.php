<?php
/**
 * Created by PhpStorm.
 * User: fabien.sanchez
 * Date: 16/02/2018
 * Time: 10:22
 */

namespace App\Http\Controllers\App;


use App\Coin;
use Illuminate\Support\Facades\DB;

class Preparation
{
    public $renduCoins = [];
    public $userMoney, $drinkPrice, $aRendre, $canMakeMoney, $enoughMoney, $makeMoney = null;
    protected $stockCoins, $userCoins = [];
    protected $glouton = true;

    function __construct($boisson, $coins)
    {
        $this->userCoins = $coins;
        $this->create_coins();
        $this->userMoney = $this->totalMoney($this->userCoins);
        $this->drinkPrice = $boisson->price;
        $this->setupMoney();
        $this->glouton();
    }

    protected function create_coins()
    {
        $coins = Coin::all()->all();
        foreach ($coins as $coin) {
            $this->stockCoins[$coin->type] = $coin->stock + $this->userCoins[$coin->type];
        }
    }

    protected function totalMoney($moneyTab)
    {
        $result = null;
        foreach ($moneyTab as $value => $stock) {
            $result += ($value * $stock);
        }
        return $result;
    }

    protected function setupMoney()
    {
        $this->aRendre = $this->userMoney - $this->drinkPrice;
        $this->makeMoney = $this->aRendre;
        if ($this->aRendre >= 0) {
            $this->enoughMoney = true;
        }
    }

    protected function glouton()
    {
        foreach ($this->stockCoins as $value => $stock) {
            while ($this->aRendre >= $value && $this->stockCoins[$value] > 0) {
                $this->transfer($value, 1);
            }
        }
        return $this->checkRendu();
    }

    protected function transfer($index, $dir)
    {
        if (!isset($this->renduCoins[$index])) {
            $this->renduCoins[$index] = 1;
        } else {
            $this->renduCoins[$index] += $dir;
        }
        $this->stockCoins[$index] -= $dir;
        $this->aRendre -= $dir * $index;
        if ($this->renduCoins[$index] == 0) {
            unset($this->renduCoins[$index]);
        }
    }

    protected function checkRendu()
    {
        if ($this->aRendre > 0) {
            if ($this->glouton) {
                $tmpStock = $this->stockCoins;
                $tmpRendu = $this->renduCoins;
                $tmpARendre = $this->aRendre;
                $this->glouton = false;
                foreach ($this->renduCoins as $value => $number) {
                    $this->transfer($value, -1);
                    $temp = $this->stockCoins[$value];
                    unset($this->stockCoins[$value]);
                    $this->glouton();
                    $this->stockCoins[$value] = $temp;
                    krsort($this->stockCoins, SORT_NUMERIC);
                    if ($this->canMakeMoney) {
                        break;
                    }
                    $this->stockCoins = $tmpStock;
                    $this->renduCoins = $tmpRendu;
                    $this->aRendre = $tmpARendre;
                }
            }
        } else {
            $this->canMakeMoney = true;
        }
    }

    public function store()
    {
        $coins = Coin::all();
        $toStock = [];
        foreach ($this->userCoins as $value => $quantity) {
            if (isset($this->renduCoins[$value])) {
                $toStock[$value] = $this->userCoins[$value] - $this->renduCoins[$value];
            } else {
                $toStock[$value] = $this->userCoins[$value];
            }
        }
        foreach ($coins as $coin) {
            if ($toStock[$coin->type] != 0) {
                $coin->increment('stock', $toStock[$coin->type]);
                $coin->save();
            }
        }
    }
}