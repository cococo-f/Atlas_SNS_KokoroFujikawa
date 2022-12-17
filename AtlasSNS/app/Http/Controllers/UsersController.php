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


     public function follow($id){
        $following_id= Auth::id();
        // フォロー登録処理 //
        \DB::table('follows')->insert([
            'following_id' => $following_id, //フォローする人＝ログインユーザー
            'followed_id' => $id //フォローされる人＝フォローするボタンを押された人
              ]);

              return back();
    }

    public function unfollow($id){
        $following_id= Auth::id();
         // フォロー解除処理 //
        \DB::table('follows')
            ->where('followed_id', $id)
            ->where('following_id',$following_id)
            ->delete();
//複数の条件をつける場合は->whereを重ねる//
        return back();
    }

    public function ProfileUpdate(Request $request){
        $user= Auth::user();


        if(!empty($request->iconimage)) {

        $filename=$request->iconimage->getClientOriginalName();
        // ファイルについていた元々の名前をそのまま付ける
        $img=$request->iconimage->storeAs('',$filename,'public');
        // それをstoreAsの引数に突っ込む

        $user->username =$request->username;
        // $user->update([～で記述するとエラーがでてbioが更新できなかったため、その記述は避ける
        $user->mail =$request->mail;
        $user->password =bcrypt($request->newpassword);
        // ↑name属性（newpassword）に気を付ける！ddメソッドで確認！
        $user->bio =$request->bio;
        $user->images=$img;
        // ファイル名を付け終わったものを表示させたいため$requestではなく$img
        $user->save();
        }

             return redirect('/top');
    }


}
