<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Recipe extends Pivot
{
    public $timestamps = false;
    protected $table = 'recipes';
    protected $fillable = ['boisson_id', 'ingredient_id', 'quantity'];
}
