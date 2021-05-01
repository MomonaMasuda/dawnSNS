<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //

    public function profile(){
        return view('posts.profile');
    }

    public function profile_update(Request $request)
    {
      $id = Auth::id();
      // dd($id);
      // dd($request->all());
      $up_user = $request->input('username');
      $up_mail = $request->input('mail');
      $up_password = bcrypt($request->input('password'));
      $up_bio = $request->input('bio');
      $up_image = $request->file('image')->store('images', "public");
      // dd($up_image);
        \DB::table('users')
            ->where('id', $id)
            ->update(
                ['username' => $up_user,'mail' => $up_mail,'password' => $up_password,'bio' => $up_bio,'image' => $up_image]
            );

        return redirect('/profile_edit');
    }

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
    ->select('users.id','users.username','users.image','posts.user_id','posts.post','posts.updated_at','follows.follow_id','follows.follower_id')
    ->orderBy('posts.updated_at','desc')
    ->get();

      return view('posts.followerList')->with([
        'icons' => $icons,
        'tweets' => $tweets,
      ]);
    }

    public function index(){
      $id = Auth::id();
      // dd($id);

      $lists = \DB::table('users')
    ->Join('posts','posts.user_id','=','users.id')
    ->Join('follows','follows.follow_id','=','users.id')
    ->select('users.id','users.username','users.image','posts.id','posts.user_id','posts.post','posts.updated_at','follows.follow_id')
    ->orderBy('posts.updated_at','desc')
    ->get();
      // dd($lists);
      return view('posts.index')->with([
        'list' => $lists,
      ]);
    }

    public function create(Request $request)
    {
     // $user_id = Auth::id();
     // $post = $request->input('newPost');
     // \DB::table('posts')->insert([
     //     'user_id' => $user_id,
     //     'post' => $post,
     // ]);
     // $post->save();

     $post = new Post;
     // dd($post);
     $post->create([
       'user_id' => Auth::id(),
       'post' => $request->newPost,
     ]);

     return redirect('top');
    }

    public function delete($id)
    {
      // dd($id);
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('top');
    }

    public function update(Request $request)
{
    $id = $request->input('id');
    $post = $request->input('post');
    \DB::table('posts')
    ->where('id', $id)
    ->update([
      'post' => $post
    ]);
    return redirect('top');
}


}
