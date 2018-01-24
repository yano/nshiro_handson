<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>確認画面</title>
    <link type="text/css" rel="stylesheet" href="/css/app.css">
</head>

<body>

    <form method="POST">
        {{ csrf_field() }}

        <ul>
            <li>
                <label>名前</label>
                {{ $data['name'] }}
            </li>
            <li>
                <label>メールアドレス</label>
                {{ $data['email'] }}
            </li>
            <li>
                <label>パスワード</label>
                （表示されません）
            </li>
        </ul>

        <a href="{{ route('signup.index') }}">戻る</a> <input type="submit" value="送信する">
    </form>

</body>

</html>