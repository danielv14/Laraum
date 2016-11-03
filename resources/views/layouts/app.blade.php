<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>
    <div id="app">
        @include('partials.navigation')

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/markdown.js"></script>
</body>
</html>
