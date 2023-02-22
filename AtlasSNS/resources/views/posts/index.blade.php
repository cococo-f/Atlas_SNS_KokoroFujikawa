@extends('layouts.login')

@section('content')
<div class="card-body">
   <div class="card-title">
</div>
    <!-- 投稿フォーム -->
    @if( Auth::check())
    <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
      {{ csrf_field() }}

      <!-- 投稿の本文 -->
      <div class="form-group">
        <div class="col-sm-6">
          <input type="text" name="post_content" class="form-control"
          placeholder="投稿内容を入力してください">

          @if(Auth::user()->images == 'dawn.png')
                    <img src="{{ asset('storage/icon1.png') }}" alt="AtlasSNSアイコン画像2" class="image2-post">

                    @else
          <img src="{{ asset('storage/'.Auth::user()->images) }}" alt="AtlasSNSアイコン画像2" class="image2-post">
          @endif


        </div>
      </div>

      <!-- 投稿ボタン -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
           <input type="image" src="images/post.png" alt="投稿ボタン画像" class="form-button">
            </input>
             </form>
             <hr class="hr1">
        </div>
      </div>
  @endif
</div>

   <!-- 全ての投稿リスト -->
   @if (count($posts) > 0)
    <div class="card-body">
      <div class="card-body">
        <table class="table table-striped task-table">

        <!-- テーブルヘッダ -->
        <head>
          <th>投稿一覧</th>
          <th> </th>
          </head>
        <!-- テーブル本体 -->
         <body>
           @foreach ($posts as $post)

           <!-- 投稿ユーザーごとの画像表示 -->
           <img src="{{ asset('/storage/'.$post->user->images) }}" alt="投稿ユーザーアイコン画像" class="image7">

             <!-- 投稿者名の表示 -->
                   <div>{{ $post->user->username }}</div>


              <!-- 投稿内容 -->
                 <!-- ↓ ＠foreachのasのあとの変数と同一なるように！ ↓-->
                 <!-- 矢印の後はカラム名！！ -->
                 <div class="">{{ $post->post }}</div>
                 <p class="">{{ $post->updated_at}}</p>

                 @if (Auth::user()->id == $post->user->id)
                 <!-- ↑if文を使ってログインユーザーのみ投稿・編集ボタンが表示されるように記述 -->
                 <!-- 投稿の編集ボタン -->
               <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">

                 <img src="images/edit.png" alt="編集ボタン"></a>

                 <!-- 投稿の削除ボタン -->
                 <a class="btn btn-danger" href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></div>
                 @endif
                </div>
            @endforeach

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
        </body>
      </table>
    </div>
  </div>
@endif


@endsection
