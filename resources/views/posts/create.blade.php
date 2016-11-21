@extends('layouts.app-without-hero')


@section('content')
  <div class="container">
    <div class="content box">
      <h1>Create post</h1>
      {!! Form::open(['route' => 'post.store']) !!}
        @include('posts.form', ['publish' => 'Create post', 'draft' => 'Save as draft'])
      {!! Form::close() !!}
    </div>
  </div>



@endsection
