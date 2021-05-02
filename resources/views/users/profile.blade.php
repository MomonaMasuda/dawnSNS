@extends('layouts.login')

@section('content')

<div class="container">
  <table class='table table-hover'>
    @foreach ($profiles as $profile)
      <a><img src="{{ asset('storage/' .$profile->image) }}" width="50" height="50"></a>
      <p>Name</p>
      <p>{{$profile->username}}</p>
      <p>bio</p>
      <p>{{$profile->bio}}</p>
  </table>

@if (Auth::user()->isFollowing($profile->id))

    <form action="{{ route('unfollow', ['id' => $profile->id]) }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

        <button type="submit" class="btn-delete">フォロー解除</button>
    </form>
@else
    <form action="{{ route('follow', ['id' => $profile->id]) }}" method="POST">
        {{ csrf_field() }}

        <button type="submit" class="btn-follow">フォローする</button>
    </form>
@endif

@endforeach

    <div class="container">
        <table class='table table-hover'>

            @foreach ($tweets as $tweet)
            <tr>
                <td><a href=""><img src="{{ asset('storage/' .$tweet->image) }}" width="50" height="50"></a></td>
                <td>{{ $tweet->username }}</td>
                <td>{{ $tweet->post }}</td>
                <td>{{ $tweet->updated_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>

</div>


@endsection
