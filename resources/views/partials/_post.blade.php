<div class="section alignment-fix box">
    <h2 class="title">
      {{$post->title}}
    </h2>
      @if ($subtitle == true)
        <h4 class="subtitle">
          @if ($owner == true)
            @if (Auth::guest())
              Created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a> |
            @else
              @if (Auth::user()->id == $post->user_id)
                My post |
              @else
                Created by <a href="{{route('pages.user', $post->user->id)}}">{{$post->user->name}}</a> |
              @endif
            @endif
          @endif
          {{ $post->created_at->diffForHumans() }}</h4>
      @endif

    <div class="post">
      {!! str_limit(
              Markdown::convertToHtml($post->body),
              $limit = 450,
              $end = '...'
              ) !!}
    </div>
    <br>
    <a class="button" href="{{route('pages.post', $post->slug)}}">{{$postBtn}}</a>
    <div class="is-pulled-right">
      @include('partials._bookmark')
    </div>
</div>
