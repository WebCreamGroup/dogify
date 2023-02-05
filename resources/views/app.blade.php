<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>{{ config('app.name') }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        @routes
        @vite('resources/js/app.js')
        @inertiaHead
    </head>
    <body class="w-full h-screen">
        @inertia
    </body>
</html>
