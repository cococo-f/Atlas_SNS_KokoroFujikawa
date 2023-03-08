@extends('layouts.login')

@section('content')
<div class="followerList-global">
  <h1 class="followerList_text">FollowerList</h1>
  @foreach($images as $images)
  <!-- ↑コントローラーでgetで値を取得する際、コレクションを単体として扱うとエラーが表示される。foreachなどを使って、要素をひとつずつ取り出して処理することで解消される。 -->
  @if($images->images == 'dawn.png')
    <a href="/usersProfile/{{$images->id}}"><img src="{{ asset('storage/icon1.png') }}" alt="フォローリスト一覧ユーザー画像" class="image3"></a>
    @else
    <a href="/usersProfile/{{$images->id}}"><img src="{{ asset('/storage/'.$images->images) }}" alt="フォロワーリスト一覧ユーザー画像" class="image3"></a>
    <!-- アイコン画像のリンクに変数imagesからidを引っぱってくる -->
  @endif
  @endforeach
</div>

<hr class="hr1">
<div class="post-main">
  <!-- indexとほぼ同じ -->
@foreach ($posts as $post)
<div class= "post-global">
@if($post->user->images == 'dawn.png')
    <a href="/usersProfile/{{$post->id}}"><img src="{{ asset('storage/icon1.png') }}" alt="投稿ユーザーアイコン画像" class="image7"></a>
    @else
    <a href="/usersProfile/{{$post->user_id}}"><img src="{{ asset('/storage/'.$post->user->images) }}" alt="フォロワーリスト一覧投稿ユーザー画像" class="image7"></a>
@endif

<div class="post-secondary">
  <p class="post-username">{{ $post->user->username }}</p>
  <p class="post-content">{{ $post->post }}</p>
</div>
  <p class="post-time">{{ $post->updated_at}}</p>
</diV>

<hr class="hr2">
 @endforeach
 </div>
@endsection
