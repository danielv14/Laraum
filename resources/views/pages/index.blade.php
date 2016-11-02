@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($posts as $post)
      <h2><a href="{{route('pages.post', $post->slug)}}">{{$post->title}}</a></h2>
      <p>created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a></p>
      <p>{{$post->body}}</p>
      <hr>
    @endforeach
  </div>

@endsection
