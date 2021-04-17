@extends('layouts.login')

@section('content')

<form method="POST" action="/profile_update">
  {{ csrf_field() }}
<div class="container">
        <table class='table table-hover'>
            <img src="images/{{Auth::user()->image}}">
            <tr>
            <th>UserName</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->username}}" name="username"></td>
            </tr>
            <tr>
            <th>MailAdress</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->mail}}" name="mail"></td>
            </tr>
            <tr>
            <th>Password</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}" name="old_password"></td>
            </tr>
            <tr>
            <th>new Password</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}" name="password"></td>
            </tr>
            <tr>
            <th>new Password(確認用)</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}" name="password_confirmation"></td>
            </tr>
            <tr>
            <th>Bio</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->bio}}" name="bio"></td>
            </tr>
            <tr>
            <th>Icon Image</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->image}}" name="image"></td>
            </tr>

            <td><button type="submit" class="btn-update">更新</button></td>

        </table>
    </div>
  </form>

@endsection
