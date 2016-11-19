@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="columns">

        <div class="column is-9">
          @foreach ($posts as $post)
            @include('partials._post', [
              'subtitle' => true,
              'postBtn' => 'Read more',
              'owner' => true
            ])
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
