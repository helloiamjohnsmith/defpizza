<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int price_as_int
 */
class Item extends Model
{
    protected $fillable = [];

    public function itemable()
    {
        return $this->morphTo();
    }

    public function getPriceAttribute()
    {
        return round($this->price_as_int / 100, 2);
    }
}
