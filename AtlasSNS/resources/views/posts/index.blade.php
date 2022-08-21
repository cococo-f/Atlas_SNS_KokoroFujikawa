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
          <img src="images/icon1.png" alt="AtlasSNSアイコン画像2" class="image2-post">
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
            <tr>
              <!-- 投稿内容 -->
               <td class="table-text">
                 <!-- ↓　47行目asのあとの変数と同一なるように！ ↓-->
                 <!-- 矢印の後はカラム名！！ -->
                 <div>{{ $post->post }}</div>
               </td>
                 <!-- 投稿者名の表示 -->
               <td class="table-text">
                   <div>{{ $post->user->username }}</div>
               </td>
               <td><a class="btn btn-primary" href="/post/{{$post->id}}/update-form">編集</a></td>
               </tr>
            @endforeach
        </body>
      </table>
    </div>
  </div>
@endif


@endsection
