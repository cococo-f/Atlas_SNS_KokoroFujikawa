@extends('layouts.login')

@section('content')

@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach

<img src="{{ asset('storage/'.Auth::user()->images) }}">

<form action="{{ url('profile-update') }}" enctype="multipart/form-data" method="post">
@csrf

<div class="UserProfile">

<p>username</p>
<input type="text" name="username" value="{{ Auth::user()->username }}">

<input type="hidden" name="id" value="{{ Auth::user()->id }}">

<p>mail address</p>
<input type="text" name="mail" value="{{ Auth::user()->mail }}">

<p>password</p>
<input type="password" name="newpassword" value="">

<p>password confirm</p>
<input type="password" name="newpassword_confirmation">

<p>bio</p>
<input type="text" name="bio" value="{{ Auth::user()->bio }}">

<p>icon image</p>
<input type="file" name="iconimage">

</div>

<input type="submit" name="profileupdate" value="更新">

</form>


@endsection
