@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>

{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('パスワード') }}
{{ Form::password('password',['class' => 'input']) }}
<!-- パスワードは伏せ字→passwordメソッドを使用。初期値は入らないためnullは不要。 -->

{{ Form::label('パスワード確認') }}
{{ Form::password('password-confirm',['class' => 'input']) }}

{{ Form::submit('登録') }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
