<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderState extends Model
{
    protected $fillable = [];

    protected $casts = [
        'finished' => 'boolean'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'state_id');
    }

    public function getFinishedOrdersAttribute()
    {
        return $this->orders()->where('finished', true)->get();
    }
}
