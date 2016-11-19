@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        <div class="content">
          <h2 class="title">{{$user->name}}'s profile</h2>
          <h4 class="subtitle">{{$posts->count()}} {{ str_plural('Post', $posts->count()) }}</h4>
        </div>
      </div>

      <div class="column is-10">
          @foreach ($posts as $post)
            @include('partials._post', [
              'subtitle' => true,
              'postBtn' => 'Read more',
              'owner' => false
            ])
          @endforeach


      </div>
    </div>




  </div>

@endsection
