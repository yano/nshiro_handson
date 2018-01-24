<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function top()
    {
        $admin = auth('admin')->user();

        return view('admin.top', compact('admin'));
    }

    public function logout()
    {
        auth('admin')->logout();

        return redirect()->route('admin.login');
    }
}
