<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('endUser.includes.head')
    @livewireStyles
    </head>
    <body>
        @include('endUser.includes.navbar')
        @yield('content')
        @include('endUser.includes.footer')
        @livewireScripts
        @stack('scripts')
    </body>
</html>
