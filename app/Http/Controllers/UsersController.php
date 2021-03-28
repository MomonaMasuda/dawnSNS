<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(Request $request,$id){
      // dd($id);

      $profiles = DB::table('users')
    ->where('users.id',$id)
    ->select('users.id','users.username','users.bio','users.image')
    ->get();

    // dd($profiles);

    return view('users.profile')->with('profiles',$profiles);
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function search(Request $request){
      $users = User::all();
      // dd($users);
    return view('users.search')->with('users', $users);
  }

  public function result(Request $request){
    #キーワード受け取り
  $keyword = $request->input('keyword');
  // dd($keyword);
  #クエリ生成
  $query = User::query();

  #もしキーワードがあったら
  if(!empty($keyword))
  {
    $users = $query->where('username','like','%'.$keyword.'%')->get();
  }

  return view('users.result',compact('users','keyword'));
  }


  public function follow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($user->id);
            return back();
        }
    }

    // フォロー解除
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($user->id);
        if($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($user->id);
            return back();
        }
    }




}
