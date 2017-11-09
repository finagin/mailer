<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- favicon -->
    @includeIf('common.favicon', ['image' => asset('images/favicon.png'), 'color' => '#EDEDF0'])

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ config('app.name', 'Laravel') }}
        @hasSection('title')
            - @yield('title')
        @endif
    </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @stack('styles')
</head>
<body>
<div id="app">
    @include('common.nav')

    @yield('content')
    @includeIf('common.footer')
</div>

<!-- Scripts -->
<script src="{{ mix('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
