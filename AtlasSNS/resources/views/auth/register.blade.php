@extends('layouts.logout')
@section('content')
<div class="login-gradation">
<section class="login-main">

<div class="login-center">
<div class="register-container">
{!! Form::open(['url' => '/register']) !!}
<p class="register-welcome">新規ユーザー登録</p>
<div>
<p class="register-username">{{ Form::label('user name') }}</p>
<label class="register-usernameForm">{{ Form::text('username',null,['class' => 'register-usernameForm']) }}</label>
@if ($errors->has('username'))
<tr>
@foreach($errors->get('username') as $message)
<p class="errors"> {{ $message }} </p>
@endforeach
</tr>
@endif
</div>

<p class="register-mail">{{ Form::label('mail adress') }}</p>
<label class="register-mailForm">{{ Form::text('mail',null,['class' => 'register-mailForm']) }}</label>
@if ($errors->has('mail'))
<tr>
@foreach($errors->get('mail') as $message)
<p class="errors"> {{ $message }} </p>
@endforeach
</tr>
@endif

<p class="register-password">{{ Form::label('password') }}</p>
<label class="register-passwordForm">{{ Form::password('password',['class' => 'register-passwordForm']) }}</label>
<!-- パスワードは伏せ字→passwordメソッドを使用。初期値は入らないためnullは不要。 -->
@if ($errors->has('password'))
<tr>
@foreach($errors->get('password') as $message)
<p class="errors"> {{ $message }} </p>
@endforeach
</tr>
@endif

<p class="register-confirm">{{ Form::label('password confirm') }}</p>
<label class="register-confirmForm">{{ Form::password('password_confirmation',['class' => 'register-confirmForm']) }}</label>
@if ($errors->has('password_confirmation'))
<tr>
@foreach($errors->get('password_confirmation') as $message)
<p class="errors"> {{ $message }} </p>
@endforeach
</tr>
@endif

{{ Form::submit('REGISTER',['class' =>'register-button']) }}
<p><a href="/login" class="login-back">ログイン画面に戻る</a></p>
{!! Form::close() !!}
</div>
</div>

</section>
</div>
@endsection
