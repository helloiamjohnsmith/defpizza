<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Order $order)
    {
        return $user->id == $order->owner_id;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Order $order)
    {
        return $user->id == $order->owner_id;
    }

    public function delete(User $user, Order $order)
    {
        return false;
    }

    public function restore(User $user, Order $order)
    {
        return false;
    }

    public function forceDelete(User $user, Order $order)
    {
        return false;
    }
}
