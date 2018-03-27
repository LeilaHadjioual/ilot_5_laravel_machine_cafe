<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'stock', 'color'];

    public function boisson() {
        return $this->belongsToMany('App\Boisson', 'recipes')
            ->withPivot('id', 'quantity');
    }
}
