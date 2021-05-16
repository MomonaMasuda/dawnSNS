@extends('layouts.login')

@section('content')

<form method="POST" action="/profile_update" enctype="multipart/form-data">
  {{ csrf_field() }}
<div class="container">
        <table class='table table-hover'>
            <img src="{{ asset('storage/' .Auth::user()->image) }}" width="50" height="50">
            <!-- <img src="../storage/UHT4yZtCFPNdhvvUX9HkGaUgxgZxtjuCpHtunlma.png"> -->
            @if ($errors->any())
            	    <div class="alert alert-danger">
            	        <ul>
            	            @foreach ($errors->all() as $error)
            	                <li>{{ $error }}</li>
            	            @endforeach
            	        </ul>
            	    </div>
            	@endif
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
            <td><input type="password" class="form-control" id="recipient-name" value="" name="old_password"></td>
            </tr>
            <tr>
            <th>new Password</th>
            <td><input type="password" class="form-control" id="recipient-name" value="" name="password"></td>
            </tr>
            <tr>
            <th>new Password(確認用)</th>
            <td><input type="password" class="form-control" id="recipient-name" value="" name="password_confirmation"></td>
            </tr>
            <tr>
            <th>Bio</th>
            <td><textarea type="text" class="form-control" id="recipient-name" value="{{ Auth::user()->bio}}" name="bio"></textarea></td>
            </tr>
            <tr>
            <th>Icon Image</th>
            <td><input type="file" class="form-control" id="recipient-name" value="{{ Auth::user()->image}}" name="image" accept=""></td>
            </tr>

            <td><button type="submit" class="btn-update">更新</button></td>

        </table>
    </div>
  </form>

@endsection
