@extends('layouts.app')

@section('content')

<div class="container">
  <h1>{{$post->title}}</h1>
  <a href="{{route('post.edit', $post->id)}}">Edit post</a>

  {!! Form::open([
           'method' => 'DELETE',
           'route' => ['post.destroy', $post->id]
         ]) !!}
           {!! Form::submit('Delete') !!}
       {!! Form::close() !!}

  {!! Markdown::convertToHtml($post->body) !!}
</div>

@endsection
