<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function search(Request $request){
      $users = User::all();
      // dd($users);
    return view('users.search')->with('users', $users);

    #キーワード受け取り
  $keyword = $request->input('keyword');
  // dd($keyword);
  #クエリ生成
  $query = User::query();

  #もしキーワードがあったら
  if(!empty($keyword))
  {
    $query->where('username','like','%'.$keyword.'%');
  }

  #ページネーション
  $users = $query->get();
  return view('users.search',compact('users','keyword','username'));
    }

}
