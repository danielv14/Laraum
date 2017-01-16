@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($bookmarks->count() != 0)
            @foreach ($bookmarks as $post)
              @include('partials._post', [
                'subtitle' => true,
                'postBtn' => 'View post',
                'owner' => false
              ])

            @endforeach
          @else
            <p>You have bookmarks</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
