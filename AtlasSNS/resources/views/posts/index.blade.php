@extends('layouts.login')

@section('content')


@if( Auth::check())
<div class="post-input">
  <!-- 投稿者の画像 -->
  @if(Auth::user()->images == 'dawn.png')
  <img src="{{ asset('storage/icon1.png') }}" alt="AtlasSNSアイコン画像2" class="image2-post">
  @else
  <img src="{{ asset('storage/'.Auth::user()->images) }}" alt="AtlasSNSアイコン画像2" class="image2-post">
  @endif

<!-- 投稿フォーム -->
  <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <!-- 投稿の本文 -->
    <input type="text" name="post_content" class="form-control"
    placeholder="投稿内容を入力してください。">
    <!--エラーメッセージ-->
    @if ($errors->has('post_content'))
      <tr>
        @foreach($errors->get('post_content') as $message)
          <td> {{ $message }} </td>
        @endforeach
      </tr>
    @endif

    <!-- 投稿ボタン -->
    <input type="image" src="images/post.png" alt="投稿ボタン画像" class="form-button">
  </form>
</div>

@endif<!--auth::checkのif-->

<hr class="hr1">




<!-- 全ての投稿リスト -->
@if (count($posts) > 0)
  <!-- テーブル本体 -->
  <div class="post-main">
    <!-- ↓ ＠foreachのasのあとの変数と同一なるように！ ↓-->
    @foreach ($posts as $post)

    <div class= "post-global">
    <!-- 投稿ユーザーごとの画像表示 -->
      @if($post->user->images == 'dawn.png')
        <img src="{{ asset('storage/icon1.png') }}" alt="投稿ユーザーアイコン画像" class="image7">
        @else
        <img src="{{ asset('/storage/'.$post->user->images) }}" alt="投稿ユーザーアイコン画像" class="image7">
      @endif

      <div class="post-secondary">
        <!-- 矢印の後はカラム名！！ -->
        <!-- 投稿者名 -->
        <div class="post-username">{{ $post->user->username }}</div>
        <!-- 投稿内容 -->
        <p class="post-content">{{ $post->post }}</p>
      </div>

        <!-- タイムスタンプ -->
        <p class="post-time">{{ $post->updated_at}}</p>
    </div>

      @if (Auth::user()->id == $post->user->id)
        <!-- ↑if文を使ってログインユーザーのみ投稿・編集ボタンが表示されるように記述 -->

        <div class ="post-tertiary">
        <!-- 投稿の編集ボタン -->
        <span><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" alt="編集ボタン" class="edit-btn">
        </a></span>
        <!-- 投稿の削除ボタン -->
        <span><a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png" alt="編集ボタン"class="delete-btn">
        </a></span>
        </div>
      @endif
      <hr class="hr2">
    @endforeach
</div>
@endif<!--countのif-->





<!-- モーダルの中身 -->
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content">
    <form action="{{ url('update') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}
      <textarea name="post_update" class="modal_post"></textarea>
      <input type="hidden" name="update_id" class="modal_id" value="">
      <input type="submit" value="更新">
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>

@endsection
