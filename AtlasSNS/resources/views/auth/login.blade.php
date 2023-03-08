
@extends('layouts.logout')
@section('content')
<div class="login-gradation">
<section class="login-main">


<div class="login-center">
<div class="login-container">
  <!-- HTMLフォームを作成する -->
  {!! Form::open(['url' => '/login']) !!}
  <p class="login-welcome">AtlasSNSへようこそ</p>
  <div>
    <p class="login-mail">{{ Form::label('mail adress') }}</p>
    <label class="login-mailForm">{{ Form::text('mail',null,['class' => 'login-mailForm']) }}</label>
  </div>
  <div>
    <p class ="login-password">{{ Form::label('password') }}</p>
    <label class ="login-passwordForm">{{ Form::password('password',['class' => 'login-passwordForm']) }}</label>
  </div>
  <p>{{ Form::submit('LOGIN',['class' =>'login-button']) }}</p>
  <p><a href="/register" class="register-induction">新規ユーザーの方はこちら</a></p>
  {!! Form::close() !!}
</div>
</div>


</section>
</div>
@endsection
