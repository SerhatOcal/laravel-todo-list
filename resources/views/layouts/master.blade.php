<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.include.head')
        <title>@yield('title', config('app.name'))</title>
        @yield('head')
    </head>
    <body>
    @yield('content')
    @include('layouts.include.footer')
    </body>
</html>


