<?php


namespace App\Actions;


use App\Models\Address;

class StoreAddress
{
    public function run(array $data): Address
    {
        $address = Address::create([
            'street' => $data['street'],
            'city' => $data['city'],
            'owner_id' => $data['owner_id'],
        ]);

        return $address;
    }
}