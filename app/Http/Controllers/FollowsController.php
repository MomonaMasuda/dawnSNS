<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Follow;

class FollowsController extends Controller
{
    public function followList(){
      $user_id = Auth::id();

      // dd($user_id);

      $icons = \DB::table('users')
    ->Join('follows','follows.follow_id','=','users.id')
    ->where('follows.follower_id',$user_id)
    ->select('users.id','users.image','follows.follow_id','follows.follower_id','follows.created_at')
    ->orderBy('follows.created_at','asc')
    ->get();

      // dd($icons);

      $tweets = DB::table('users')
    ->Join('posts','posts.user_id','=','users.id')
    ->Join('follows','follows.follow_id','=','users.id')
    ->where('follows.follower_id',$user_id)
    ->select('users.id','users.username','users.image','posts.user_id','posts.post','posts.updated_at','follows.follow_id')
    ->orderBy('posts.updated_at','desc')
    ->get();

    // dd($tweets);

        return view('follows.followList')->with([
          'icons' => $icons,
          'tweets' => $tweets,
      ]);
    }


}
