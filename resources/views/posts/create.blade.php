@extends('layouts.app')


@section('content')
  <div class="container">
    <h1>Create post</h1>

    {!! Form::open(['route' => 'post.store']) !!}
      @include('posts.form', ['submit' => 'Create post'])
    {!! Form::close() !!}
  </div>

@endsection
