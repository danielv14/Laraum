@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{$post->title}}</h1>
    <p>created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a></p>
    <p>{{$post->body}}</p>
  </div>

@endsection
