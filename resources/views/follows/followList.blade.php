@extends('layouts.login')

@section('content')

<div class="container">

            @foreach ($icons as $icon)

                <td><a href="{{ url('profile'.$icon->follow_id) }}"><img src="{{ asset('storage/' .$icon->image) }}" width="50" height="50"></a></td>
            @endforeach
</div>

<div class="container">
        <table class='table table-hover'>
            @foreach ($tweets as $tweet)
            <tr>
                <td><a href="{{ url('profile'.$tweet->follow_id) }}"><img src="{{ asset('storage/' .$tweet->image) }}" width="50" height="50"></a></td>
                <td>{{ $tweet->username }}</td>
                <td>{{ $tweet->post }}</td>
                <td>{{ $tweet->updated_at }}</td>
            </tr>
            @endforeach
        </table>
</div>

@endsection
