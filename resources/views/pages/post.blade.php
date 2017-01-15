@extends('layouts.app-without-hero')

@section('content')
  <div class="container">
    <div class="columns box">
      <div class="column is-2">
          <h2 class="title">By <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a></h2>
          <h4 class="subtitle">{{ $post->created_at->diffForHumans() }}</h4>
          <p>
            @include('partials._bookmark')
            @include('partials._like')
          </p>
          @unless (Auth::guest())
            @if (Auth::user()->id == $post->user_id)
              <a class="button" href="{{route('post.edit', $post->id)}}">
                @if ($post->draft)
                  Edit draft
                @else
                  Edit post
                @endif
              </a>
              <br><br>
              {!! Form::open([
                'method' => 'DELETE',
                'route' => ['post.destroy', $post->id]
              ]) !!}
                {!! Form::submit('Delete', ['class' => 'button is-danger is-outlined']) !!}
              {!! Form::close() !!}
            @endif
          @endunless
      </div>

      <div class="column is-10">
        <article class="content post">
          <h2>{{$post->title}}</h2>
          {!! Markdown::convertToHtml($post->body) !!}
        </article>
      </div>
    </div>


 </div>

@endsection
