<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a href="/" class="nav-item logo brand-font">
        Laraum
      </a>
    </div>
    <span @click.prevent="toggleNav" class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      @if (Auth::guest())
        <a class="nav-item" href="{{ url('/login') }}">Log in</a>
        <span class="nav-item">
          <a class="button is-primary is-outlined" href="{{ url('/register') }}">Sign Up</a>
        </span>
      @else
        <a class="nav-item" href="{{ route('profile.index') }}">Profile</a>
        <span class="nav-item">
          <a href="{{ route('post.create') }}" class="button is-primary is-outlined">
            <span>Create post</span>
          </a>
        </span>
      @endif
    </div>
  </div>
</header>
