<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>管理者ログイン</title>
    <link type="text/css" rel="stylesheet" href="/css/app.css">
</head>

<body>

<h2>管理者ログイン</h2>

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
            <label for="id_username">ログインID</label>
            <input type="text" name="username" id="id_username" value="{{ old('username') }}">
            {{--ユーザのセッション情報をデフォルト値に設定してもいいが、そこまではいらんかも--}}
        </li>
        <li>
            <label for="id_password">パスワード</label>
            <input type="password" name="password" id="id_password">
        </li>
    </ul>
    <input type="submit" value="ログイン">
</form>

</body>

</html>
