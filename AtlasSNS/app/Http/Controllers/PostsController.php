<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller{
    //
    public function index(){
        // 全ての投稿を取得 //
    // $posts = Post::get();

    $posts = DB::table('posts')
            ->select('posts.post','posts.created_at','user_id as username')
            ->join('users', 'username', '=', 'user_id')
            ->get();

    return view('posts.index',[
        'posts'=> $posts
      ]);
    }

    public function store(Request $request){
        // dd($request);
        // //バリデーション
        // $validator = Validator::make($request->all(),
        // ['post_content' => 'required|max:200',]);

        // //バリデーションエラー
        // if ($validator->fails()) {
        //     return redirect('/')
        //     >withInput()
        //     ->withErrors($validator);
        // }

        //登録処理
        $posts= $request->post_content;
        $user_id= Auth::id();
        \DB::table('posts')->insert([
            'post' => $posts,
            'user_id' => $user_id  //ここでログインしているユーザidを登録
              ]);

        return redirect('/top');
    }

}
