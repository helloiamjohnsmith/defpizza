<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class LoginToUseEmail implements Rule
{

    public function __construct()
    {

    }

    public function passes($attribute, $email)
    {
        $user = User::where('email', $email)->first();

        return null == $user;
    }

    public function message()
    {
        return 'You must log in to use this email.';
    }
}
