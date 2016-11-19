@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="columns">

        <div class="column is-9">
          @foreach ($posts as $post)
            <div class="section alignment-fix">
                <h2 class="title">
                  {{$post->title}}
                </h2>
                  <h4 class="subtitle">Created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a> {{ $post->created_at->diffForHumans() }}</h4>

                <div class="post">
                  {!! str_limit(
                          Markdown::convertToHtml($post->body),
                          $limit = 450,
                          $end = '...'
                          ) !!}
                </div>
                <br>
                <a class="button" href="{{route('pages.post', $post->slug)}}">Read more...</a>
                <div class="is-pulled-right">
                  @include('partials._bookmark')
                </div>
            </div>
          @endforeach
        </div>

        <div class="column is-3 is-hidden-mobile">
          <div class="content box">
            <h2 class="title">Popular posts</h2>
            @foreach ($popular as $post)
              <h4 class="subtitle"><a href="{{route('pages.post', $post->slug)}}">{{ $post->title }}</a></h4>
            @endforeach
          </div>
        </div>

      </div>
    </div>



@endsection
