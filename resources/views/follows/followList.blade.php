@extends('layouts.login')

@section('content')

<div class="container">
        <table class='table table-hover'>
            <tr>
                <th></th>
            </tr>
            @foreach ($icons as $icon)
            <tr>
                <td><a href="{{ url('profile'.$icon->follow_id) }}"><img src="{{ asset('storage/' .$icon->image) }}" width="50" height="50"></a></td>
            </tr>
            @endforeach
        </table>
</div>

<div class="container">
        <table class='table table-hover'>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
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
