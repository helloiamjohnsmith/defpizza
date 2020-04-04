<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable;

    public function itemsExcludedFrom()
    {
        return $this->belongsToMany(Item::class, 'excluded_ingredients', 'ingredient_id', 'item_id');
    }

    public function usedInPizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_ingredients', 'ingredient_id', 'pizza_id');
    }

    public function getNotUsedInPizzasAttribute()
    {
        $usedIn = $this->usedInPizzas->pluck('id')->toArray();

        return Pizza::whereNotIn('id', $usedIn);
    }
}
