@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>{{$post->title}}</h1>
    <p>created by {{$post->user->name}}</p>
    <p>{{$post->body}}</p>
  </div>

@endsection
