@extends('layouts.admin')


@section('content')

    <h1>ユーザ一覧</h1>

    <table border="1">
        <tr>
            <td>名前</td>
            <td>メールアドレス</td>
            <td>メッセージ</td>
            <td>削除</td>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            {{--<td>{{ $user->messages()->count() }}</td>--}}
            <td>{{ $user->messages_count }}</td>
            {{--<td><input type="button" class="del_btn" data-id="{{ $user->id }}" value="削除"></td>--}}
            <td>{!! delete_form(['admin.user.destroy', $user->id], 'ユーザを削除') !!}</td>
        </tr>
        @endforeach
    </table>

@stop