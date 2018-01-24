@extends('layouts.admin')

@section('content')

    <h2>管理者トップ</h2>

    <p>
        こんにちは。{{ $admin->username }}さん。
    </p>

@endsection
