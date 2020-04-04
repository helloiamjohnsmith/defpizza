<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'street', 'city', 'state', 'post_code', 'country', 'additional', 'latitude', 'longitude'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
