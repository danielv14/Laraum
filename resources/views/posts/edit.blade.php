@extends('layouts.app-without-hero')

@section('content')
  <div class="container">
    <div class="content">
      <h1>Edit post</h1>
      {!! Form::model($post, ['method' => 'PATCH', 'route' => ['post.update', $post->id]]) !!}
        @include('posts.form', ['submit' => 'Update post'])
      {!! Form::close() !!}
    </div>
  </div>
@endsection
