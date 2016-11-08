@extends('layouts.app-without-hero')

@section('content')

<div class="container">
  <div class="columns">
    <div class="column is-2">
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



    </div>
    <div class="column is-10">
      <div class="content post-content">
        <h1>{{$post->title}}</h1>
        {!! Markdown::convertToHtml($post->body) !!}
      </div>
    </div>
  </div>

</div>

@endsection
