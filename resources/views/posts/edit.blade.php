@extends('layouts.app')

@section('content')
  <div class="container">

    {!! Form::model($post, ['method' => 'PATCH', 'route' => ['post.update', $post->id]]) !!}
      @include('posts.form', ['submit' => 'Update post'])
    {!! Form::close() !!}
  </div>
@endsection
