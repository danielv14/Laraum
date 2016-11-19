@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($drafts->count() != 0)
            @foreach ($drafts as $post)
              <div class="section box">
                <h2 class="title">
                  {{ $post->title }}
                  @if ($post->draft == true)
                    <span class="tag is-light is-medium">Draft</span>
                  @endif
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
            <p>You have drafts at this point</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
