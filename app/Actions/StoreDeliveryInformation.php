<?php

namespace App\Actions;


use App\Models\DeliveryType;
use App\Models\Promo;
use App\Rules\LoginToUseEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoreDeliveryInformation
{
    public function run(array $data): void
    {
        $this->validator($data)->validate();

        $type = DeliveryType::find($data['type']);

        $deliveryInfo = [
            'type' => ['id' => $type->id, 'title' => $type->title, 'price' => $type->price],
            'user' => [
                'name' => Auth::check()
                    ? Auth::user()->first_name
                    : $data['first_name'],
                'email' => Auth::check()
                    ? Auth::user()->email
                    : $data['email']],
            'contacts' => ['street' => $data['street'], 'city' => $data['city']],
            'promo' => Promo::where('code', $data['promo'])->first()
        ];

        request()->session()->put('delivery', $deliveryInfo);
    }

    protected function validator(array $data)
    {
        $rules = [
            'type' => ['required'],
            'street' => ['required', 'min:3'],
            'promo' => ['nullable', 'exists:promos,code']
        ];

        if (!Auth::check()) {
            $rules['first_name'] = ['required', 'string', 'max:255'];
            $rules['email'] = ['required', 'string', 'email', 'max:255', new LoginToUseEmail()];
        }

        return Validator::make($data, $rules);
    }
}