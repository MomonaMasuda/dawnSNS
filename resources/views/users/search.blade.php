@extends('layouts.login')

@section('content')
<form class="username" action="{{url('/result')}}" method="get">
  <p><input type="text" name="keyword" placeholder="ユーザー名" value="{{isset($keyword)}}"></p>
<button type="submit" class="btn-create"></button>
</form>

<table class="table">
  <tr>
    <th>画像</th>
    <th>ユーザ名</th>
  </tr>
@foreach($users as $user)
  <tr>
    <td><a href="{{ url('profile'.$user->id) }}"><img src="{{ asset('storage/' .$user->image) }}" width="50" height="50"></a></td>
    <td>{{$user->username}}</td>

    <td>
      @if (Auth::user()->isFollowing($user->id))
        <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="btn-delete">フォロー解除</button>
        </form>
    @elseif(Auth::id() == $user->id)
    @else
        <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
            {{ csrf_field() }}

            <button type="submit" class="btn-follow">フォローする</button>
        </form>
      @endif
        </td>
  </tr>

@endforeach
</table>



@endsection
