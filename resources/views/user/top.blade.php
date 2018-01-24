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

<h1>こんにちは {{ $user->name }} さん。</h1>

<a href="{{ route('user.logout') }}">ログアウト</a>

</body>