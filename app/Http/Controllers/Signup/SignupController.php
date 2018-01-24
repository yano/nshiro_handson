<?php

namespace App\Http\Controllers\Signup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class SignupController extends Controller
{
//    /**
//     * 検証済みデータ格納用セッションキー
//     * @var string
//     */
    const SESSION_KEY = 'signupdata';

    public function index()
    {
        $user = new User();
        if ($data = session()->get(self::SESSION_KEY)){
            $user->fill($data);
        }

        return view('signup.index', compact('user'));
    }

    public function postIndex(Request $request)
    {
        // validation
        $this->validate($request, [
            'name'      => 'required|max:255',
            'email'     => 'required|max:255|email|unique:users,email',
            'password'  => 'required|confirmed|min:6|max:255', //|password_between:4,30|password_string',
        ]);

//        $data = [
//            'name' => $request->name,
//            'email' => $request->email,
//            'password' => bcrypt($request->password), //セッションにはハッシュを保存しよう
//        ];
        $data = $request->only('name','email','password');
        $data['password'] = bcrypt($data['password']); #ハッシュ化

        // セッションに保存
        session()->put(self::SESSION_KEY, $data);

        return redirect()->route('signup.confirm'); //redirectは他のコントローラにコントロールを以上する処理
    }

    public function confirm()
    {
        $data = session()->get(self::SESSION_KEY);
        if (! $data)
            return redirect()->route('user.signup');

//        $data += ['hoge' => 'konya ga yamada'];
//        return  $data;

        return view('signup.confirm', compact('data'));
    }

    public function postConfirm()
    {
        $data = session()->get(self::SESSION_KEY);
        if (! $data)
            return redirect()->route('user.signup');

        $user = new User();
        $user->fill($data)->save(); //forceFillもある

        // guard区分、userでログイン
        auth('user')->login($user);

        // sessionは忘れる
        session()->forget(self::SESSION_KEY);

        return redirect()->route('user.thanks');
    }


}

