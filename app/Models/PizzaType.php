<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaType extends Model
{
    protected $fillable = [];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'current_pizza_types', 'type_id', 'pizza_id');
    }
}
