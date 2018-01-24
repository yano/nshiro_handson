<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    // app/Http/Auth/LoginController.php参考

    //　AuthenticateUsersのトレイト
    use AuthenticatesUsers;

    // ログイン後のリダイレクト先の指定
    public function redirectTo()
    {
        return route('admin.top');
    }

    // showLoginForm`でログインフォームを表示している。
    // login関数はAuthenticateUsers内で定義されているのでオーバーライドしてはいけない！！
    public function showLoginForm()
    {
        return view('admin.login');
    }

    protected function ValidateLogin(Request $request)
    {
        $messages = [
            $this->username().'.required' => 'ログインIDを入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ];

        $this->validate($request, [
            $this->username() => 'required|string|max:32',
            'password' => 'required|string'
        ], $messages);
    }

    // DBの何を利用してユーザ認証するかを指定する。email以外で認証する場合、必ず継承する必要がある。
    protected function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        $userGuest = auth('user')->guest(); // || auth('admin')->guest();

        auth('admin')->logout();

        // ユーザでログインしてなかった場合のみ、セッションは廃棄する
        if ($userGuest){
            $request->session()->invalidate();
        }

        return redirect()->route('admin.login');
    }

    // 使用する認証区分を指定する。必ず必要。
    protected function guard()
    {
        return auth('admin');
    }
}
