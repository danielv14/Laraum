@extends('layouts.app-without-hero')

@section('content')
  <div class="container">
    <div class="columns">
      <div class="column is-2">
        <div class="content">
          <h2 class="title">Created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a></h2>
          <h4 class="subtitle">{{ $post->created_at->diffForHumans() }}</h4>

        </div>

      </div>
      <div class="column is-10">
        <div class="content post-content">
          <h1>{{$post->title}}</h1>

          {!! Markdown::convertToHtml($post->body) !!}
        </div>
      </div>
    </div>


 </div>

@endsection
