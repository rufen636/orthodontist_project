<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700|Oswald:400,700" rel="stylesheet">
    @vite('resources/css/app.css')
    @yield('head')
</head>
<body class="font-sans">
@include('layouts.header')
<div class="flex flex-col">
    <div class="flex flex-1">
        <!-- Main -->
        <main class="flex-col items-center justify-center flex-1 xl:pl-0 pl-10 py-8">
            @yield('content')
        </main>
    </div>
</div>

@include('layouts.footer')
</body>
</html>

