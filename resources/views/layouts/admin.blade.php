<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--TODO:これは何--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>管理者</title>

    <link type="text/css" rel="stylesheet" href="/css/app.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

<ul>
    <li><a href="{{ route('admin.user.index') }}">ユーザ一覧</a></li>
    <li><a href="{{ route('admin.message.index') }}">個別ユーザへのメッセージ</a></li>
    <li><a href="{{ route('admin.logout') }}">ログアウト</a></li>
</ul>

@yield('content')

</body>

</html>
