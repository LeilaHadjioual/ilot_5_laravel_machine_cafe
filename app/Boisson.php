<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boisson extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'price', 'color'];

    public function sales()
    {
        return $this->hasMany('App\Sale');
    }

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient', 'recipes')
            ->withPivot('id', 'quantity');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'sales')
            ->withPivot('id')
            ->withTimestamps();
    }
}
