<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $fillable = [];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'available_pizza_sizes');
    }
}
