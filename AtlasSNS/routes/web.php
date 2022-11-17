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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ

// ログイン画面 //
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

// ユーザー登録 //
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

// 登録完了 //
Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

// ログアウト //
Route::get('/logout', 'Auth\LoginController@logout');


//ログイン中のページ


// ログイン中のユーザーのみ閲覧可能なページの設定 //
Route::group(['middleware' => 'auth'], function() {

// プロフィール //
Route::get('/profile','UsersController@profile');

// ユーザー検索 //
Route::get('/search','UsersController@search');

// ユーザー検索結果 //
Route::get('/searchresult','UsersController@searchresult');

// フォローする処理 //
Route::get('/follow/{id}', 'UsersController@follow');

// フォロー解除処理 //
Route::get('/unfollow/{id}', 'UsersController@unfollow');


// フォローリスト //
Route::get('/follow-list','FollowsController@followList');
// フォロワーリスト //
Route::get('/follower-list','FollowsController@followerList');

// 投稿画面の表示//
Route::get('/top','PostsController@index');

// 投稿処理 //
Route::post('/posts','PostsController@store');

// 投稿更新処理 //
Route::post('/update', 'PostsController@update');

//投稿削除処理//
Route::get('/post/{id}/delete', 'PostsController@delete');

});
