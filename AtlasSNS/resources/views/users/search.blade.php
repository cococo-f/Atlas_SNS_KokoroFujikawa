@extends('layouts.login')
@section('content')
<!-- ユーザー検索フォーム -->
  <div class="form-global">
  <form action="{{ url('searchResult') }}" method="GET" class="form-local">
    {{ csrf_field() }}
    <input type="text" name="keyword" class="form-search" placeholder="ユーザー名">
    <!-- name属性はコントローラーのinput()と一致しないと受け渡しができない -->
    <!-- ユーザー検索ボタン -->
    <button type="submit" class="form-searchButton">検索</button>
    </form>

  @if(!empty($keyword))
  <span class="search-word">検索ワード：{{$keyword}}</span>
  @endif
</div>

  <div class="hr1"></div>


<!-- ユーザー一覧の表示 -->
<div class="search-main">
@foreach ($users as $user)
<div class="search-wrapper">
  <!-- ユーザーごとの画像表示 -->
  @if($user->images == 'dawn.png')
    <img src="{{ asset('images/icon1.png') }}" alt="検索ユーザーアイコン画像" class="image10">
    @else
    <img src="{{ asset('/images/'.$user->images) }}" alt="検索ユーザーアイコン画像" class="image10">
  @endif
  <p class="search-username">{{ $user->username }}</p>
  </div>
  <!-- フォローする・フォロー解除ボタン -->
  @if (auth()->user()->isFollowing($user->id))
    <p class="unFollow-btn"><a href="/unfollow/{{$user->id}}">フォロー解除</a></p>
    @else
    <p class="follow-btn"><a href="/follow/{{$user->id}}">フォローする</a></p>
  @endif
@endforeach
</div>
@endsection
