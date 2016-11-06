@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>{{ $user->name }}</h1>
    @if ($posts->count() != 0)
      @foreach ($posts as $post)
        <h2><a href="{{route('post.show', $post->id)}}">{{ $post->title }}</a></h2>
        <p>created at {{ $post->created_at }}</p>
        <br>
      @endforeach
    @else
      <p>You have not written any posts yet</p>
    @endif

  </div>

@endsection
