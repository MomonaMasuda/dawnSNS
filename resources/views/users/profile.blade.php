@extends('layouts.login')

@section('content')

<div class="container">
        <table class='table table-hover'>
          @foreach ($profiles as $profile)
            <a><img src="images/dawn.png"></a>
            <p>Name</p>
            <p>{{$profile->username}}</p>
            <p>bio</p>
            <p>{{$profile->bio}}</p>
          @endforeach
        </table>

          <form action="" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button type="submit" class="btn-delete">フォロー解除</button>
          </form>

          <form action="" method="POST">
              {{ csrf_field() }}

              <button type="submit" class="btn-follow">フォローする</button>
          </form>


</div>


@endsection
