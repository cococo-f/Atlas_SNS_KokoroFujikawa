<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }


    public function search(){
        // 全てのユーザーを取得 //
         $users = \DB::table('users')-> get();
        return view('users.search', ['users'=> $users]);
    }


    public function searchresult(Request $request){
        // 検索結果を取得 //
        $keyword = $request->input('keyword');
        // ブレードのname属性と一致しないと受け渡しができない

        // dd($keyword);確認用！書く場所に注意！

        $query = User::query();

        if(!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        // 第一引数：検索したいカラム名
        // 第二引数：LIKEそのまま
        // 第三引数：検索ワード（部分一致）

        $users = $query->get();
        // 検索に引っかかった人だけを変数に入れている

        return view('users.search', compact('keyword','users'));
    }
}
