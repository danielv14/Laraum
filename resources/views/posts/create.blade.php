@extends('layouts.app-without-hero')


@section('content')
  <div class="container">
    <div class="content">
      <h1>Create post</h1>
      {!! Form::open(['route' => 'post.store']) !!}
        @include('posts.form', ['submit' => 'Create post'])
      {!! Form::close() !!}
    </div>
  </div>



@endsection
