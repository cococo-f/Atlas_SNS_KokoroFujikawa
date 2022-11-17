<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->latest()->get();


        return view('follows.followList',['posts'=>$posts]);
    }


    public function followerList(){
$posts = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('following_id'))->latest()->get();

        return view('follows.followerList',['posts'=>$posts]);
    }
}
