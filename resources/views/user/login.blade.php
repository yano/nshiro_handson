<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ユーザログイン</title>
    <link type="text/css" rel="stylesheet" href="/css/app.css">
</head>

<body>

<h2>ユーザログイン</h2>

{{--エラー出力--}}
@if ($errors->any())
    <ul class="error-box">
        @foreach($errors->all() as $_error)
            <li>{{ $_error }}</li>
        @endforeach
    </ul>
@endif


<form method="POST">

    {{ csrf_field() }}

    <ul>
        <li>
            <label for="id_email">メールアドレス</label>
            <input type="text" id="id_email" name="email" value="{{ old('email') }}">
        </li>
        <li>
            <label for="id_password">パスワード</label>
            <input type="password" id="id_password" name="password">
        </li>
    </ul>

    <input type="submit" value="ログイン">
</form>




<a href="{{ route('signup.index') }}">ユーザー登録画面へ</a>

</body>
</html>
