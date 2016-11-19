@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        <div class="content">
          <h2 class="title">{{$user->name}}'s profile</h2>
          <h4 class="subtitle">{{$user->posts->count()}} {{ str_plural('Post', $user->posts->count()) }}</h4>
        </div>
      </div>

      <div class="column is-10">
          @foreach ($posts as $post)
            <div class="section">
              <h2 class="title">{{ $post->title }}</h2>
              <h4 class="subtitle">{{$post->created_at->diffForHumans()}}</h4>
              {!! str_limit(
                Markdown::convertToHtml($post->body),
                $limit = 450,
                $end = '...'
              ) !!}
              <br>
              <br>
              <a class="button" href="{{route('pages.post', $post->slug)}}">Read more</a>
              <div class="is-pulled-right">
                @include('partials._bookmark')
              </div>
            </div>
          @endforeach


      </div>
    </div>




  </div>

@endsection
