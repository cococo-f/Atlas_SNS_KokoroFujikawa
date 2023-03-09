<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller{
    //
    public function index(){
        // 全ての投稿を取得 //
    //  $posts = Post::get();

    $posts =Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
    //フォローしている人と自分の投稿//


     return view('posts.index',compact('posts'));
    }



    protected function validator(array $data){
        return Validator::make($data, [
            'post_content' => 'required|between:1,200',
        ]);
}

    public function store(Request $request){

        //登録処理
        $posts= $request->post_content;
        $user_id= Auth::id();
        $data = $request->input();
        $validator = $this->validator($data);


        //もしバリデーションに引っかかった場合は元の画面に戻る//
        if($validator->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
        }

        \DB::table('posts')->insert([
            'post' => $posts,
            'user_id' => $user_id  //ここでログインしているユーザidを登録
              ]);

        return redirect('/top');
    }

    public function update(Request $request){
        //投稿内容の更新処理
        $id = $request->update_id;
        $up_post = $request->post_update;
        \DB::table('posts')
            ->where('id', $id)
            ->update(
                ['post' => $up_post]
            );

        return redirect('/top');
    }

     public function delete($id){
         //投稿内容の削除処理
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('/top');
    }
}
