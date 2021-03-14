<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }

    public function followicon(){
      DB::table('users')
          ->Join('follows','follows.follow_id','=','users.id')
          ->select('users.id','users.image','follows.follow_id','follows.created_at')
          ->orderBy('follows.created_at','asc')
          ->get();

      dd($icon);

      return view('follows.followList',['icon'=>$icon]);
    }


}
