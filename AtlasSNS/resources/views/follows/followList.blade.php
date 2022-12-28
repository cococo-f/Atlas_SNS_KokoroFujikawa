@extends('layouts.login')

@section('content')
<h1 class="followlist_text">FollowList</h1>
@foreach($images as $images)
<!-- ↑コントローラーでgetで値を取得する際、コレクションを単体として扱うとエラーが表示される。foreachなどを使って、要素をひとつずつ取り出して処理することで解消される。 -->
<a href="/top"><img src="{{ asset('/storage/'.$images->images) }}" alt="フォローリスト一覧ユーザー画像" class="image3"></a>

@endforeach

<hr class="hr1">
@foreach ($posts as $post)
<diV><img src="{{ asset('/storage/'.$post->user->images) }}" alt="フォローリスト一覧投稿ユーザー画像" class="image5"></diV>
 <div>{{ $post->user->username }}</div>


 <div class="">{{ $post->post }}</div>

 @endforeach

@endsection
