<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Sale extends pivot
{
    protected $table = 'sales';
    protected $fillable = ['boisson_id', 'user_id', 'sugar', 'boisson_name', 'price', 'money_user', 'make_money'];

    public function boisson()
    {
        return $this->belongsTo('App\Boisson');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
