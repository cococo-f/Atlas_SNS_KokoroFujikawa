@extends('layouts.login')
@section('content')

<!-- ユーザー画像 -->
<div class="profile-global">

<div class="profile-icon">
  @if(Auth::user()->images == 'dawn.png')
  <img src="{{ asset('storage/icon1.png') }}" alt="AtlasSNSアイコン画像3" class="image2">
  @else
  <img src="{{ asset('storage/'.Auth::user()->images) }}" alt="AtlasSNSアイコン画像3" class="image2">
  @endif
</div>

<!-- プロフィール入力フォーム -->
<div class="userProfile-input">
  <form action="{{ url('profile-update') }}" enctype="multipart/form-data" method="post" name="profile-form">
  @csrf
  <!-- ユーザー名・エラーメッセージ -->
  <div class="userProfile-primary">
  <span class="userProfile-local">
  <p class="usersProfile-common">user name</p>
  <input type="text" name="username" value="{{ Auth::user()->username }}" style="width:350px; height:35px; margin: 0 0 0 150px; background-color: #dcdcdc; font-size:18px;">
  </span>
  @if ($errors->has('username'))
  <tr>
  @foreach($errors->get('username') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
  </div>

  <!-- メールアドレス・エラーメッセージ -->
  <div class="userProfile-primary">
  <span class="userProfile-local">
  <p class="usersProfile-common">mail address</p>
  <input type="text" name="mail" value="{{ Auth::user()->mail }}" style="width:350px; height:35px; margin: 0 0 0 130px; background-color: #dcdcdc; font-size:18px;">
  </span>
  @if ($errors->has('mail'))
  <tr>
  @foreach($errors->get('mail') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
</div>

  <!-- パスワード・エラーメッセージ -->
  <div class="userProfile-primary">
  <span class="userProfile-local">
  <p class="usersProfile-common">password</p>
  <input type="password" name="password" style="width:350px; height:35px; margin: 0 0 0 160px; background-color: #dcdcdc; font-size:18px;">
  </span>
  @if ($errors->has('password'))
  <tr>
  @foreach($errors->get('password') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
  </div>

  <!-- パスワード確認・エラーメッセージ -->
  <div class="userProfile-primary">
  <span class="userProfile-local">
  <p class="usersProfile-common">password confirm</p>
  <input type="password" name="password_confirmation" style="width:350px; height:35px; margin: 0 0 0 80px; background-color: #dcdcdc; font-size:18px;">
  </span>
  @if ($errors->has('password_confirmation'))
  <tr>
  @foreach($errors->get('password_confirmation') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
  </div>

  <!-- 自己紹介文・エラーメッセージ -->
  <div class="userProfile-primary">
  <span class="userProfile-local">
  <p class="usersProfile-common">bio</p>
  <input type="text" name="bio" value="{{ Auth::user()->bio }}" style="width:350px; height:35px; margin: 0 0 0 225px; background-color: #dcdcdc; font-size:18px;">
  </span>
  @if ($errors->has('bio'))
  <tr>
  @foreach($errors->get('bio') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
  </div>

  <!-- ユーザー画像・エラーメッセージ -->
  <div class="userProfile-primary">
  <div class="userProfile-local">
  <p class="usersProfile-common">icon image</p>
  <input type="file" name="iconimage" style="margin: 0 0 0 150px; background-color: #dcdcdc; width:295px; height:60px; padding:40px 0 0 60px; border: 1.8px solid #696969;">
  </div>
  @if ($errors->has('iconimage'))
  <tr>
  @foreach($errors->get('iconimage') as $message)
  <p class="errors"> {{ $message }} </p>
  @endforeach
  </tr>
  @endif
  </div>

  </div>
</div>
<!-- 更新ボタン -->
<label>
<button class="usersProfile-button">更新</button>
</label>
</form>
@endsection
