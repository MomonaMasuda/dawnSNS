@extends('layouts.login')

@section('content')
<div class="container">
        {!! Form::open(['url' => 'top']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '何をつぶやこうか…？']) !!}
        </div>
        <button type="submit" class="btn-create"></button>
        {!! Form::close() !!}
    </div>


<div class="container">
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($list as $list)
            <tr>
                <td>{{ $list->id }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
