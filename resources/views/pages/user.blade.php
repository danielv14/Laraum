@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">
      <div class="column is-2">
        <div class="content">
          <h2 class="title">{{$user->name}}'s profile</h2>
          <h4 class="subtitle">{{$user->posts->count()}} Posts</h4>

        </div>
      </div>
      <div class="column is-10">
        <div class="content post-content">
          @foreach ($user->posts as $post)
            <h3 class="post-content">{{ $post->title }}</h3>
            {!! str_limit(
              Markdown::convertToHtml($post->body),
              $limit = 450,
              $end = '...'
            ) !!}
            <br>
            <br>
            <a class="button" href="{{route('pages.post', $post->slug)}}">Read more</a>

          @endforeach
        </div>

      </div>
    </div>




  </div>

@endsection
