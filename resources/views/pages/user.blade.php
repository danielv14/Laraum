@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>Dislaying profile of {{$user->name}}</h1>

    <h2>All posts by user</h2>
    @foreach ($user->posts as $post)
      <h3><a href="{{route('pages.post', $post->slug)}}">{{$post->title}}</a></h3>
      <p>{{$post->body}}</p>
    @endforeach

  </div>

@endsection
