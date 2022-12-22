<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;


class FollowsController extends Controller
{
    //
    public function followList(){
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();
       //全ての投稿から[user_idとfollowed_idが同じの投稿]という条件付き（whereIn）で取り出している！//
       //Auth::user→ログインユーザー//
       //follows→リレーションのfollowsメソッド//
       //pluck('followed_id')→followed_idカラムから引き抜く//

       $user = auth()->user();//ユーザー認証

       $images = \DB::table('users')->where('images')->get();
       //userテーブルのimageカラムを取得
       $images = auth()->user()->follows()->get();//ログインユーザーがフォローしている値を取得

        return view('follows.followList',['posts'=>$posts,'images'=>$images]);
    }



    public function followerList(){
         $posts = Post::query()->whereIn('user_id', Auth::user()->followers()->pluck('following_id'))->latest()->get();
         //followers→リレーションのfollowersメソッド//

        $user = auth()->user();//ユーザー認証

        $images = \DB::table('users')->where('images')->get();
        //userテーブルのimageカラムを取得
        $images = auth()->user()->followers()->get();//ログインユーザーがフォローされている値を取得


        return view('follows.followerList',['posts'=>$posts,'images'=>$images]);
    }

}
