<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('common.head')
</head>
<body>
    <div id="app">
        @include('common.header')
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
