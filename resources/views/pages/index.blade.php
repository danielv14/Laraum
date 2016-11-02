@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Laraum medium clone</h1>

    @foreach ($posts as $post)
      <h2><a href="{{route('page.show', $post->slug)}}">{{$post->title}}</a></h2>
      <p>created by {{$post->user->name}}</p>
      <p>{{$post->body}}</p>
      <hr>
    @endforeach
  </div>

@endsection
