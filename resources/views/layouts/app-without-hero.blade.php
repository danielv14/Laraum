<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.navbar')
        @include('partials.flash')

        <div class="section nav-fix content-wrapper">
          @yield('content')
        </div>

        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/markdown.js"></script>
</body>
</html>
