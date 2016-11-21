{{--

  Post partial used inside $posts foreach loop
  Using variables in include statement for hiding and showing
  different parts of the partials

  $subtitle [bool]     If subtitle should be displayed or not
  $owner    [bool]     Display different text inside subtitle if user is owner of post
  $postBtn  [string]   Button text for displaying post in its entierly

 --}}

<article class="section alignment-fix box">
    <h2 class="title">
      <a href="{{route('pages.post', $post->slug)}}">{{$post->title}}</a>
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

    <div class="post post-segment">
      {!! str_limit(
              Markdown::convertToHtml($post->body),
              $limit = 450,
              $end = '...'
              ) !!}
    </div>
    <a class="button" href="{{route('pages.post', $post->slug)}}">{{$postBtn}}</a>
    <div class="post-actions">
      <span class="is-pulled-left">
        @include('partials._like')
      </span>
      <div class="is-pulled-right">
        @include('partials._bookmark')
      </div>
    </div>
</article>
