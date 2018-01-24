<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>登録画面</title>
    <link type="text/css" rel="stylesheet" href="/css/app.css">
</head>

<body>

    {{--エラー出力--}}
    @if ($errors->any())
        <ul class="error-box">
            @foreach($errors->all() as $_error)
                <li>{{ $_error }}</li>
            @endforeach
        </ul>
    @endif

    {{--普通はformのaction属性でフォーム送信＋リダイレクトするが同一ページにリダイレクトするため省略している--}}
    <form method="POST" >
        {{ csrf_field() }}
        <ul>
            <li>
                <label for="id_name">名前</label>
                <input type="text" name="name" id="id_name" value="{{ old('name', $user->name) }}">
                {{--ユーザのセッション情報をデフォルト値に設定してもいいが、そこまではいらんかも--}}
            </li>
            <li>
                <label for="id_email">メールアドレス</label>
                <input type="text" name="email" id="id_email" value="{{ old('email', $user->email) }}">
            </li>
            <li>
                <label for="id_password">パスワード</label>
                <input type="password" name="password" id="id_password">
            </li>
            <li>
                <label for="id_password2">パスワード（確認用）</label>
                <input type="password" name="password_confirmation" id="id_password2">
            </li>
        </ul>
        <input type="submit" value="登録確認にすすむ">
    </form>

</body>

</html>
