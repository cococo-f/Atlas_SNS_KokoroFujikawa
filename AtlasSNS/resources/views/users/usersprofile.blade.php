@extends('layouts.login')
@section('content')

<!-- クリックした他ユーザーのプロフィール表示 -->
<div class="users_profile">
<img src="{{ asset('/storage/'.$user->images) }}" alt="他ユーザーアイコン画像" class="image8">

<div class=""> name </div>
<div class="">{{ $user->username}}</div>
<div class="">bio </div>
<div class="">{{ $user->bio}}</div>

</div>

<hr class="hr1">

 @foreach ($posts as $post)
    <!-- 投稿ユーザーごとの画像表示 -->
      <img src="{{ asset('/storage/'.$post->user->images) }}" alt="他ユーザー投稿アイコン画像" class="image9">

    <!-- 投稿者名の表示 -->
      <div>{{ $post->user->username }}</div>
      <p class="">{{ $post->updated_at}}</p>

    <!-- 投稿内容 -->
    <!-- ↓ ＠foreachのasのあとの変数と同一なるように！ ↓-->
    <!-- 矢印の後はカラム名！！ -->
        <div class="">{{ $post->post }}</div>
 @endforeach
@endsection
