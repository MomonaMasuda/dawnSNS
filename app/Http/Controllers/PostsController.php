<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     $post = $request->input('newPost');
     \DB::table('posts')->insert([
         'post' => $post
     ]);

     return redirect('posts.index');
    }

}
