<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Follow;

class UsersController extends Controller
{
    public function index(User $user)
    {
      $all_users = $user->getAllUsers(auth()->user()->id);

      return view('users.index', [
        'all_users' => $all_users
      ]);
    }
}
