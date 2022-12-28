@extends('layouts.login')

@section('content')
<h1 class="followerlist_text">FollowerList</h1>

@foreach($images as $images)
<!-- ↑コントローラーでgetで値を取得する際、コレクションを単体として扱うとエラーが表示される。foreachなどを使って、要素をひとつずつ取り出して処理することで解消される。 -->
<a href="/usersProfile/{{$images->id}}"><img src="{{ asset('/storage/'.$images->images) }}" alt="フォロワーーリスト一覧ユーザー画像" class="image4"></a>
<!-- アイコン画像のリンクに変数imagesからidを引っぱってくる -->
@endforeach

<hr class="hr1">
@foreach ($posts as $post)
<img src="{{ asset('/storage/'.$post->user->images) }}" alt="フォロワーリスト一覧投稿ユーザー画像" class="image6">
 <div>{{ $post->user->username }}</div>

  <div class="">{{ $post->post }}</div>

 @endforeach
@endsection
