@extends('layouts.login')

@section('content')
<form action="{{ url('search') }}" method="POST" class="">
      {{ csrf_field() }}

      <!-- ユーザー検索フォーム -->
      <div class="form-group2">
        <div class="col-sm-6">
          <input type="text" name="search_content" class="form-search"
          placeholder="ユーザー名">

      <!-- ユーザー検索ボタン -->
      <button type="submit" class="search-form-button">検索</button>
    </form>
  <hr class="hr1">

<!-- ユーザー一覧の表示 -->
 @foreach ($users as $user)
<div>{{ $user->username }}</div>

<!-- ユーザーごとの画像表示 -->
<a class="btn btn-usericon"><img src="images/icon2.png" alt="ユーザーアイコン画像" class="user_image"></a>

<!-- ユーザーごとのフォローする・フォロー解除ボタン -->
<p class="follow-btn"><a href="/">フォローする</a></p>
<p class="unfollow-btn"><a href="/">フォロー解除</a></p>
@endforeach


  </div>
</div>
@endsection
