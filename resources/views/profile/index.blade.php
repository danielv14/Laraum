@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">
      <div class="column is-2">
        <h2 class="title">My profile</h2>
        <h4 class="subtitle">{{ $posts->count() }} posts</h4>
        <a class="button" href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          Log out
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </div>
      <div class="column is-10">
        <div class="content post-content">
          @if ($posts->count() != 0)
            @foreach ($posts as $post)
              <h3 class="post-content">{{ $post->title }}</h3>
              {!! str_limit(
                Markdown::convertToHtml($post->body),
                $limit = 450,
                $end = '...'
              ) !!}
              <br>
              <br>
              <a class="button" href="{{route('post.show', $post->id)}}">View post</a>
            @endforeach
          @else
            <p>You have not written any posts yet</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
