@extends('layouts.app-without-hero')

@section('content')

<div class="container">
  <div class="columns">

    <div class="column is-2">
      <a class="button" href="{{route('post.edit', $post->id)}}">Edit post</a>
      <br><br>
      {!! Form::open([
        'method' => 'DELETE',
        'route' => ['post.destroy', $post->id]
      ]) !!}
        {!! Form::submit('Delete', ['class' => 'button is-danger is-outlined']) !!}
      {!! Form::close() !!}
    </div>

    <div class="column is-10">
      <div class="content post-content">
        <h1>
          {{$post->title}}
          @if ($post->draft == true)
            <span class="tag is-light is-medium">Draft</span>
          @endif
        </h1>
        {!! Markdown::convertToHtml($post->body) !!}
      </div>
    </div>
  </div>

</div>

@endsection
