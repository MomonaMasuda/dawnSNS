<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/info', function () {
//     phpinfo();
// });


Auth::routes();



//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');




//ログイン中のページ
Route::group(['middleware' => 'auth'], function(){

    Route::get('/top','PostsController@index');

    Route::post('/top','PostsController@create');

    Route::get('/profile','UsersController@profile');

    Route::get('/search','UsersController@search');

    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');

    Route::get('/result','UsersController@result');

    Route::get('/follow-list','PostsController@followList');
    Route::get('/follower-list','PostsController@followerList');

    Route::get('/logout','UsersController@logout');
});
