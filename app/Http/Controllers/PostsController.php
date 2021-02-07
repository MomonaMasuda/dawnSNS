<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $list = \DB::table('posts')->get();
        // dd($list);
        return view('posts.index',['list'=>$list]);
    }

    public function followList(){
        return view('follows.followList');
    }

    public function followerList(){
        return view('follows.followerList');
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

     return redirect('posts.index');
    }

}
