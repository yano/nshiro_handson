@extends('layouts.admin')

@section('content')

    <h1>メッセージ{{ ($message->exists) ? '変更':'登録'  }}</h1>

    {{--エラー出力--}}
    @if ($errors->any())
        <ul class="error-box">
            @foreach($errors->all() as $_error)
                <li>{{ $_error }}</li>
            @endforeach
        </ul>
    @endif

    {{--成功時のメッセージ--}}
    @if ($_flash_msg = Session::get('_flash_msg'))
        <p class="info-box">{{ $_flash_msg }}</p>
    @endif

    <form method="POST">
        {{ csrf_field() }}

        <ul>
            <li>
                <label for="id_user_id">誰宛</label>
                <select name="user_id" id="id_user_id">
                    <option value="">選択してください</option>
                    @foreach($userlist as $key => $val)
                        <option value="{{ $key }}"
                            @if(old('user_id', $message->user_id) == $key) selected @endif>
                        {{ $val }}
                        </option>f
                    @endforeach
                </select>
            </li>

            <li>
                <label for="id_title">タイトル</label>
                <input type="text"
                       name="title"
                       id="id_title"
                       size="50"
                       value="{{ old('title', $message->title) }}">
            </li>

            <li>
                <label for="id_content">本文</label>
                <textarea name="content"
                          id="id_content"
                          cols="60"
                          rows="10">{{ old('content', $message->content) }}</textarea>
            </li>
        </ul>
            <input type="submit" value="{{ ($message->exists) ? '変更する':'登録する'}}">
    </form>

@stop

