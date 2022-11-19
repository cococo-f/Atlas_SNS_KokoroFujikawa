@extends('layouts.login')

@section('content')
@foreach ($posts as $post)
 <div>{{ $post->user->username }}</div>

  <div class="">{{ $post->post }}</div>

 @endforeach
@endsection
