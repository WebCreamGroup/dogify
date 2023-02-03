<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <title>{{ config('app.name') }}</title>

        <style>[x-cloak] { display: none !important; }</style>
        {{ Vite::useBuildDirectory('build/app')->useHotFile('hot-app')->withEntryPoints(['src/css/app.css', 'src/js/app.js']) }}
        @livewireStyles
        @livewireScripts
        @stack('scripts')
    </head>

    <body class="antialiased">
        <div class="container mx-auto p-5 space-y-16 flex flex-col h-screen">
            <x-layout.app-navbar/>

            <div class="grow py-10">
                @if($slot !== null)
                    {{ $slot }}
                @else
                    @yield('layout.content')
                @endif
            </div>

            <x-layout.footer/>
        </div>

        @livewire('notifications')
    </body>
</html>
