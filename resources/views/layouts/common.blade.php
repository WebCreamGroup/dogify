<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('app.name') }}</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        @routes
        {{ Vite::useBuildDirectory('build/common')->useHotFile('hot-common')->withEntryPoints(['src/app.js']) }}
        @inertiaHead
    </head>
    <body>
        @inertia
    </body>
</html>
