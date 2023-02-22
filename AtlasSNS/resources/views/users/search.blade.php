@extends('layouts.login')

@section('content')
<form action="{{ url('searchresult') }}" method="GET" class="">
      {{ csrf_field() }}

      <!-- ユーザー検索フォーム -->
      <div class="form-group2">
        <div class="col-sm-6">
          <input type="text" name="keyword"
          class="form-search"
          placeholder="ユーザー名">
          <!-- name属性はコントローラーのinput()と一致しないと受け渡しができない -->


      <!-- ユーザー検索ボタン -->
      <button type="submit" class="search-form-button">検索</button>
    </form>
    @if(!empty($keyword))
     <span class="search-word">検索ワード：{{$keyword}}</span>
  @endif

  <div class="hr1"></div>

<!-- ユーザー一覧の表示 -->
 @foreach ($users as $user)
 <div class="search-wrapper">

 <!-- ユーザーごとの画像表示 -->
 @if($user->images == 'dawn.png')
 <div class="btn btn-usericon"><img src="{{ asset('storage/icon1.png') }}" alt="検索ユーザーアイコン画像" class="image10">

@else
<img src="{{ asset('/storage/'.$user->images) }}" alt="検索ユーザーアイコン画像" class="image10">
</div>
@endif


<div>{{ $user->username }}</div>


<!-- ユーザーごとのフォローする・フォロー解除ボタン -->
@if (auth()->user()->isFollowing($user->id))

<div class="unFollow-btn"><a href="/unfollow/{{$user->id}}">フォロー解除</a></div>

 @else
<div class="follow-btn"><a href="/follow/{{$user->id}}">フォローする</a></div>
 @endif
@endforeach
 </div>

</div>
</div>
@endsection
