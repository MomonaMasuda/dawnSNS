@extends('layouts.login')

@section('content')
<form class="username" action="{{url('/result')}}" method="get">
  <p><input type="text" name="keyword" placeholder="ユーザー名" value="{{isset($keyword)}}"></p>
<button type="submit" class="btn-create"></button>
</form>

<h1>ユーザー一覧</h1>
<table class="table">
  <tr>
    <th>画像</th>
    <th>ユーザ名</th>
  </tr>
@foreach($users as $user)
  <tr>
    <td>{{$user->image}}</td>
    <td>{{$user->username}}</td>

  </tr>

@if (auth()->user()->isFollowing($users->id))
<form action="{{ route('unfollow', ['id' => $users->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <button type="submit" class="btn">フォローを外す</button>
</form>
@else
<form action="{{ route('follow', ['id' => $users->id]) }}" method="POST">
    {{ csrf_field() }}
    <button type="submit" class="btn">フォローする</button>
</form>
  @endif
@endforeach
</table>


@endsection
