<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Auth;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }


    public function search(){
        // whereで条件指定し、ログインユーザー以外を取得 //
         $users = \DB::table('users')->where('id','!=',1)->get();
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

    protected function validator(array $data){
        return Validator::make($data, [
            'username' => 'required|string|between:2,12',
            'mail' => ['required','string','email','between:5,40',Rule::unique('users')->ignore($data['mail'],'mail'),],
            'password' => 'alpha_num|between:8,20|confirmed',
            'bio' => 'max:150',
            'iconimage' => 'alpha_num|mimes:jpg,png,bmp,gif,svg',
        ]);
}

    public function ProfileUpdate(Request $request){
        $user= Auth::user();
        $data = $request->input();
        $validator = $this->validator($data);

        if(!empty($request->iconimage)) {
        //もしアイコン画像が入力された場合//

        if($validator->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
        }
        //もしバリデーションに引っかかった場合は元の画面に戻る//

        $filename=$request->iconimage->getClientOriginalName();
        // ファイルについていた元々の名前をそのまま付ける
        $img=$request->iconimage->storeAs('',$filename,'public');
        // それをstoreAsの引数に突っ込む
        $user->images=$img;
        // ファイル名を付け終わったものを表示させたいため$requestではなく$img
        }

        if($validator->fails()){
        return redirect()->back()
        ->withInput()
        ->withErrors($validator);
        }
        //もしバリデーションに引っかかった場合は元の画面に戻る//

        $user->username =$request->username;
        // $user->update([～で記述するとエラーがでてbioが更新できなかったため、その記述は避ける
        $user->mail =$request->mail;
        $user->password =bcrypt($request->password);
        // ↑name属性（password）に気を付ける！ddメソッドで確認！
        $user->bio =$request->bio;

        $user->save();

        return redirect('/top');
    }


    public function usersProfile($id){
        $user=User::where('id',$id)->first();
        //取得するidはひとりだからgetやallではなくfirst//

        $images=User::where('id',$id);
        $posts=Post::where('user_id',$id)->get();
        //ユーザー情報と投稿情報をテーブル結合しなくても別々で取得できる//


         return view('users.usersProfile',['user'=>$user,'images'=>$images,'posts'=>$posts]);
    }
}
