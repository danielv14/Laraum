@extends('layouts.app-without-hero')

@section('content')

  <div class="container">
    <div class="columns">

      <div class="column is-2">
        @include('profile._aside')
      </div>

      <div class="column is-10">
        <div class="">
          @if ($drafts->count() != 0)
            @foreach ($drafts as $post)
              @include('partials._post', [
                'subtitle' => true,
                'postBtn' => 'View draft',
                'owner' => false
              ])

            @endforeach
          @else
            <p>You have no drafts at this point</p>
          @endif
        </div>

      </div>
    </div>

  </div>

@endsection
