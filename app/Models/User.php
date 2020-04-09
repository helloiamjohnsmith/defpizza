<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = [
        'birth_date'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'owner_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'owner_id');
    }

    public function getVerifiedAttribute()
    {
        return null !== $this->email_verified_at;
    }
}
