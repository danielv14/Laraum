@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($posts->count() != 0)
            @foreach ($posts as $post)
              @include('partials._post', [
                'subtitle' => true,
                'postBtn' => 'View post',
                'owner' => false
              ])

            @endforeach
          @else
            <p>You have not written any posts yet</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
