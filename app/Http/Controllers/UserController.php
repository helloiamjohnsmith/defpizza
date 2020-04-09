<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();

        return view('pages.profile')->withUser($user);
    }

    public function updateProfile(Request $request, User $user)
    {
        $this->validator($request->all())->validate();

        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;

        $user->save();

        return back()->with('message', 'Profile was succesfully updated!');
    }

    public function verifyEmail()
    {
        $user = Auth::user();

        $user->email_verified_at = Carbon::now();

        $user->save();

        return back();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
        ]);
    }
}
