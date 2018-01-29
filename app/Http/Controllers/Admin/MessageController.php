<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Message;
use App\User;

use App\Http\Requests\SaveMessage; # FormRequest. FormRequestはRequestを継承している

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

    // SaveRequestはインスタンス化の時点でValidationが呼び出される
    public function store(SaveMessage $request, Message $message)
    {
        $data = $request->getData(); //only('user_id', 'title', 'content');

//        $message->forceFill($data)->save();
        $message->fill($data)->save();

        return redirect()->route('admin.message.edit', $message)->with('_flash_msg', '登録が完了しました');
    }

    public function edit(Message $message)
    {
        $userlist = User::getUserList();

        return view('admin.message.create', compact('message','userlist')); //->with();
    }

    public  function update(SaveMessage $request, Message $message)
    {
        $data = $request->getData(); //only('user_id', 'title', 'content');

        $message->forceFill($data)->save();

        return redirect()->route('admin.message.edit', $message)->with('_flash_msg', '変更が完了しました。');
    }
}
