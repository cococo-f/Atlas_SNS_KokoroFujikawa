@extends('layouts.login')

@section('content')


<img src="{{ asset('storage/'.Auth::user()->images) }}">


<form action="{{ url('profile-update') }}" enctype="multipart/form-data" method="post">
@csrf

<div class="UserProfile">

<p>username</p>
<input type="text" name="username" value="{{ Auth::user()->username }}">

@if ($errors->has('username'))
<tr>
  @foreach($errors->get('username') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif


<p>mail address</p>
<input type="text" name="mail" value="{{ Auth::user()->mail }}">

@if ($errors->has('mail'))
<tr>
  @foreach($errors->get('mail') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif


<p>password</p>
<input type="password" name="password" value="">

@if ($errors->has('password'))
<tr>
  @foreach($errors->get('password') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif


<p>password confirm</p>
<input type="password" name="password_confirmation">

@if ($errors->has('password_confirmation'))
<tr>
  @foreach($errors->get('password_confirmation') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif



<p>bio</p>
<input type="text" name="bio" value="{{ Auth::user()->bio }}">

@if ($errors->has('bio'))
<tr>
  @foreach($errors->get('bio') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif


<p>icon image</p>
<input type="file" name="iconimage">

@if ($errors->has('iconimage'))
<tr>
  @foreach($errors->get('iconimage') as $message)
  <td> {{ $message }} </td>
  @endforeach
</tr>
@endif


</div>

<input type="submit" name="profileupdate" value="更新">

</form>


@endsection
