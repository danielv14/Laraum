<aside class="menu">
  <p class="menu-label">My posts</p>
  <ul class="menu-list">
    <li><a class="{{ set_active_route('profile.index') }}" href="{{route('profile.index')}}">{{$posts->count()}} Published</a></li>
    <li><a class="{{ set_active_route('profile.drafts') }}" href="{{route('profile.drafts')}}">{{ $drafts->count() }} {{ str_plural('Draft', $drafts->count()) }}</a></li>
    <li><a class="{{ set_active_route('profile.bookmarks') }}" href="{{route('profile.bookmarks')}}">{{ $bookmarks->count() }} {{ str_plural('Bookmark', $bookmarks->count()) }}</a></li>

    <li><a href="{{ route('post.create') }}">Create post</a></li>

  </ul>
  <p class="menu-label">My profile</p>
  <ul class="menu-list">
    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out</a></li>
  </ul>
</aside>

<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
