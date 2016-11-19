@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($bookmarks->count() != 0)
            @foreach ($bookmarks as $post)
              <div class="section box">
                <h2 class="title">
                  {{ $post->title }}
                </h2>
                {!! str_limit(
                  Markdown::convertToHtml($post->body),
                  $limit = 450,
                  $end = '...'
                ) !!}
                <br>
                <br>
                <a class="button" href="{{route('post.show', $post->id)}}">View post</a>
                <div class="is-pulled-right">
                  @include('partials._bookmark')
                </div>
              </div>

            @endforeach
          @else
            <p>You have not written any posts yet</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
