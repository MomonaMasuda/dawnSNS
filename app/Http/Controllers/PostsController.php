<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //

    public function followerList(){
      $user_id = Auth::id();

      // dd($user_id);

      $icons = \DB::table('users')
    ->Join('follows','follows.follower_id','=','users.id')
    ->where('follows.follow_id',$user_id)
    ->select('users.id','users.image','follows.follow_id','follows.follower_id','follows.created_at')
    ->orderBy('follows.created_at','asc')
    ->get();

      // dd($icons);

      $tweets = DB::table('users')
    ->Join('posts','posts.user_id','=','users.id')
    ->Join('follows','follows.follower_id','=','users.id')
    ->where('follows.follow_id',$user_id)
    ->select('users.id','users.username','users.image','posts.user_id','posts.post','posts.updated_at','follows.follow_id')
    ->orderBy('posts.updated_at','desc')
    ->get();

      return view('posts.followerList')->with([
        'icons' => $icons,
        'tweets' => $tweets,
      ]);
    }

    public function index(){
        $list = \DB::table('posts')->orderBy('posts.created_at','desc')
        ->get();
        // dd($list);
        return view('posts.index',['list'=>$list]);
    }

    public function create(Request $request)
    {
     $user_id = Auth::id();
     $post = $request->input('newPost');
     \DB::table('posts')->insert([
         'user_id' => $user_id,
         'post' => $post,
     ]);
     $post = save();

     return redirect('posts.create');
    }

}
