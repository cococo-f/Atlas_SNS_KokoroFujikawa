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

    // 投稿者の名前を表示↓
    $posts = Post::with('user')->orderBy('created_at', 'desc')->get();
     return view('posts.index',compact('posts'));
    }

    public function store(Request $request){

        //登録処理
        $posts= $request->post_content;
        $user_id= Auth::id();
        \DB::table('posts')->insert([
            'post' => $posts,
            'user_id' => $user_id  //ここでログインしているユーザidを登録
              ]);

        return redirect('/top');
    }

    public function update(Request $request){
        //更新処理
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
         //更新処理
        \DB::table('posts')
            ->where('id', $id)
            ->delete();

        return redirect('index');
    }
}
