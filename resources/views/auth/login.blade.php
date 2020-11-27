@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<div class="login-cont">

    <p>DAWNSNSへようこそ</p>

        <div class="login-form">
          <div class="text">
            {{ Form::label('e-mail') }}
            <br>
            {{ Form::text('mail',null,['class' => 'input']) }}
            <br>
            {{ Form::label('password') }}
            <br>
            {{ Form::password('password',['class' => 'input']) }}
          </div>
        </div>

    <br>
<div class="button">
    {{ Form::submit('ログイン') }}
</div>

    <p><a href="/register">新規ユーザーの方はこちら</a></p>

</div>

{!! Form::close() !!}

@endsection
