@extends('layouts.app-without-hero')

@section('content')
  <div class="container">
    <div class="columns">

      <div class="column is-2">
          <h2 class="title">By <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a></h2>
          <h4 class="subtitle">{{ $post->created_at->diffForHumans() }}</h4>
          @unless (Auth::guest())
            @if (Auth::user()->id == $post->user_id)
              <div class="control is-grouped">
                <p class="control">
                  <a class="button" href="{{route('post.edit', $post->id)}}">Edit post</a>
                </p>
                <p class="control">
                  {!! Form::open([
                    'method' => 'DELETE',
                    'route' => ['post.destroy', $post->id]
                  ]) !!}
                    {!! Form::submit('Delete', ['class' => 'button is-danger is-outlined']) !!}
                  {!! Form::close() !!}
                </p>
              </div>
            @endif
          @endunless

      </div>

      <div class="column is-10">
        <div class="content post">
          <h2>{{$post->title}}</h2>
          {!! Markdown::convertToHtml($post->body) !!}
        </div>
      </div>
    </div>


 </div>

@endsection
