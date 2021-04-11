@extends('layouts.login')

@section('content')

<div class="container">
        <table class='table table-hover'>
            <img src="images/{{Auth::user()->image}}">
            <tr>
            <th>UserName</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->username}}"></td>
            </tr>
            <tr>
            <th>MailAdress</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->mail}}"></td>
            </tr>
            <tr>
            <th>Password</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}"></td>
            </tr>
            <tr>
            <th>new Password</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}"></td>
            </tr>
            <tr>
            <th>new Password(確認用)</th>
            <td><input type="password" class="form-control" id="recipient-name" value="{{ Auth::user()->password}}"></td>
            </tr>
            <tr>
            <th>Bio</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->bio}}"></td>
            </tr>
            <tr>
            <th>Icon Image</th>
            <td><input type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->image}}"></td>
            </tr>

            <td><button type="submit" class="btn-update">更新</button></td>

        </table>
    </div>

@endsection
