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
        return view('posts.followerList');
    }

    public function index(){
        $list = \DB::table('posts')->get();
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
