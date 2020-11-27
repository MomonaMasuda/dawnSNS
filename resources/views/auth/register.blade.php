@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="login-cont">

<p>新規ユーザー登録</p>

    <div class="login-form">
        <p class="text">
            {{ Form::label('ユーザー名') }}
            <br>
            {{ Form::text('username',null,['class' => 'input']) }}
            <br>
            {{ Form::label('メールアドレス') }}
            <br>
            {{ Form::text('mail',null,['class' => 'input']) }}
            <br>
            {{ Form::label('パスワード') }}
            <br>
            {{ Form::password('password',null,['class' => 'input']) }}
            <br>
            {{ Form::label('パスワード確認') }}
            <br>
            {{ Form::password('password-confirm',null,['class' => 'input']) }}
        </p>
    </div>

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

</div>

{!! Form::close() !!}


@endsection
