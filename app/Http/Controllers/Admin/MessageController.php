<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Message;
use App\User;

class MessageController extends Controller
{
    public function index()
    {
        # with('user')はEagerローディングというもの（何）
        $messages = Message::latest()->with('user')->get();

        return View('admin.message.index', compact('messages'));
    }

    public function create(Message $message)
    {
        $userlist = User::getUserList();

        return view('admin.message.create', compact('message', 'userlist'));
    }

    public function store(Request $request)
    {

    }

    public function edit($message)
    {
        return 'admin.message.edit:' . $message;
    }

    public  function update(Request $request)
    {

    }
}
