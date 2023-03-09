@extends('layouts.login')
@section('content')
<!-- クリックした他ユーザーのプロフィール表示 -->
<div class="usersProfile-global">
  @if($user->images == 'dawn.png')
    <img src="{{ asset('images/icon1.png') }}" alt="検索ユーザーアイコン画像" class="image4">
    @else
    <img src="{{ asset('/images/'.$user->images) }}" alt="他ユーザーアイコン画像" class="image4">
  @endif
  <div class ="usersProfile-main">
    <p> name </p>
    <p class="usersProfile-username">{{ $user->username}}</p>
  </div>
  <div class ="usersProfile-secondary">
    <p>bio </p>
    <p class="usersProfile-bio">{{ $user->bio}}</p>
    </div>
  @if (auth()->user()->isFollowing($user->id))
  <div class="unFollow-btn2"><a href="/unFollow/{{$user->id}}">フォロー解除</a></div>
  <!-- もしフォローしていたらフォロー解除ボタンを表示 -->
  @else
  <div class="follow-btn2"><a href="/follow/{{$user->id}}">フォローする</a></div>
  <!-- もしフォローしていなかったらフォローするボタンを表示 -->
  @endif
</div>


<hr class="hr1">

<div class="post-main">
  @foreach ($posts as $post)
  <div class= "post-global">
    <!-- 投稿ユーザーごとの画像表示 -->
    @if($user->images == 'dawn.png')
      <img src="{{ asset('images/icon1.png') }}" alt="検索ユーザーアイコン画像" class="image7">
      @else
      <img src="{{ asset('/images/'.$post->user->images) }}" alt="他ユーザー投稿アイコン画像" class="image7">
    @endif

    <div class="post-secondary">
      <!-- 投稿者名の表示 -->
      <p>{{ $post->user->username }}</p>
      <!-- 投稿内容 -->
      <p class="post-content">{{ $post->post }}</p>
    </div>
    <!-- タイムスタンプ -->
    <p class="post-time">{{ $post->updated_at}}</p>
  </div>
  <hr class="hr2">
  @endforeach
</div>
@endsection
