@extends('layouts.login')

@section('content')
<form class="username" action="{{url('/result')}}" method="get">
  <p><input type="text" name="keyword" placeholder="ユーザー名" value="{{isset($keyword)}}"></p>
<button type="submit" class="btn-create"></button>
</form>

@if($users->count())

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
    <td><a class="btn" href="">フォローする</a></td>
  </tr>
@endforeach
</table>

@else
<p>見つかりませんでした。</p>
@endif

@endsection
