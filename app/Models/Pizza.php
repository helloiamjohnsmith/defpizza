<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static whereNotIn(string $string, $usedIn)
 */
class Pizza extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'description', 'weight', 'carbohydrate', 'fat', 'protein', 'energy'
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredients');
    }

    public function items()
    {
        return $this->morphMany(Item::class, 'itemable');
    }

    public function availableSizes()
    {
        return $this->belongsToMany(Size::class, 'available_sizes');
    }

    public function types()
    {
        return $this->belongsToMany(PizzaType::class, 'current_pizza_types');
    }

    public function prices()
    {
        return $this->hasMany(PizzaPrice::class, 'pizza_id');
    }

    public function getActualPriceAttribute()
    {
        return $this->prices()
            ->whereDate('started_at', '<=', Carbon::now()->toDateString())
            ->whereDate('ended_at', '>=', Carbon::now()->toDateString())
            ->first();
    }
}
