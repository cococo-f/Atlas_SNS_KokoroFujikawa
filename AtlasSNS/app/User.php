<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

 // postsテーブルとのリレーション（主テーブル側）
    public function posts() { //1対多の「多」側なので複数形
    return $this->hasMany(Post::class);
  }


// UserテーブルとUserテーブルのリレーション//
//イレギュラーで同じテーブルで管理できるため１つのところに記述している（通常は別テーブル同士をつなげる）//


    // フォロワー→フォロー
    public function followers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }


  // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->exists();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->exists();
    }
}
