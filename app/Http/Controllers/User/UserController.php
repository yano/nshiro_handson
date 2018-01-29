<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function thanks()
    {
        return view('user.thanks');
    }

    public function top()
    {
        $user = auth()->user();//->name;

        return view('user.top', compact('user'));
    }

    public function logout()
    {
        auth('user')->logout();

        return redirect()->route('user.login');
    }
}
