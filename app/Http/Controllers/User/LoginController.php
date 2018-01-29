<?php

namespace App\Http\Controllers\User;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        //TODO:
        return view('user.login');
    }

    public function redirectTo()
    {
        return route('user.top');
    }

    protected function guard()
    {
        return auth('user');
    }

    protected function ValidateLogin(Request $request)
    {
        // validation
        $this->validate($request, [
            'email'     => 'required|string|email|max:255', //|unique:users,email',
            'password'  => 'required|string|min:6|max:255', //|password_between:4,30|password_string',
        ]);

        // returnなし
    }


}
