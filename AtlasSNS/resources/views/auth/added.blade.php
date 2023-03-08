@extends('layouts.logout')
@section('content')
<div class="login-gradation">
<section class="login-main">

<div class="login-center">
<div class="added-container">
{!! Form::open(['url' => '/added']) !!}


<p class="added-username"> {{ Session('username') }} さん</p>
<p class="added-welcome">ようこそ！AtlasSNSへ！</p>
<p class="added-text">ユーザー登録が完了いたしました。</p>
<p class="added-text2">早速ログインをしてみましょう！</p>
<diV class="login-backButton">
<p class="backButton"><a href="/login" class="backButton-color">ログイン画面へ</a></p>
</diV>
{!! Form::close() !!}
</div>
</div>

</section>
</div>
@endsection
