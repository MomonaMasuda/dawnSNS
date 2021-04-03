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
            @foreach ($list as $list)
            <tr>
                <td><a href="{{ url('profile'.$list->follow_id) }}"><img src="images/{{$list->image}}"></a></td>
                <td>{{ $list->username }}</td>
                <td>{{ $list->post }}</td>
                <td>{{ $list->updated_at }}</td>
                <td><a href="/{{$list->id}}/update"><img src="images/edit.png"></a></td>
                <td><a href="/{{$list->id}}/delete" onclick="return confirm('このつぶやきを削除します。よろしいでしょうか？')"><img src="images/trash.png" onmouseover="this.src='images/trash_h.png'" onmouseout="this.src='images/trash.png'"></a></td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection
