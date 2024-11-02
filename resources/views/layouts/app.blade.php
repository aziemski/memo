<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Memo') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav>
        <a href="/" class="active">Home</a>
        <a href="/login">Login</a>
        <a href="/profile">Profile</a>
    </nav>
    <main>
        @yield('content')
    </main>
</div>

</body>
</html>
