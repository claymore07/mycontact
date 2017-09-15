@include('layouts.partials.header')
<body>
    <div id="app">
@include('layouts.partials.navbar')
        @yield('content')
    </div>

    <!-- Scripts -->
@include('layouts.partials.footer')
</body>
</html>
