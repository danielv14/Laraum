@if (Session::has('flash_message'))
  <div id="flash" class="notification {{ Session::get('alert-class', 'is-info') }}">
    <h2 class="has-text-centered">
      {{ session('flash_message') }}
    </h2>
  </div>
@endif
