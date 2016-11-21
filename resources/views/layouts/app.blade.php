<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.main-hero')

        <div class="section content-wrapper">
          @yield('content')
        </div>

        @include('partials.footer')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/markdown.js"></script>
</body>
</html>
