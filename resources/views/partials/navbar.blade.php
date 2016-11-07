<header class="nav">
  <div class="container">
    <div class="nav-left">
      <a href="/" class="nav-item logo">
        LARAUM
      </a>
    </div>
    <span @click.prevent="toggleNav" class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu">
      @if (Auth::guest())
        <a class="nav-item" href="{{ url('/login') }}">Login</a>
        <a class="nav-item" href="{{ url('/register') }}">Register</a>
      @else
        <a class="nav-item" href="{{ route('profile.index') }}">Profile</a>
        <span class="nav-item">
          <a href="{{ route('post.create') }}" class="button is-primary">
            <span>Create post</span>
          </a>
        </span>
      @endif
    </div>
  </div>
</header>
