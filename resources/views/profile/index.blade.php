@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($posts->count() != 0)
            @foreach ($posts as $post)
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
