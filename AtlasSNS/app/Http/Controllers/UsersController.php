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
}
