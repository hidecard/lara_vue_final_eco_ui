<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="">
    <link rel="stylesheet" href="{{ asset('css/loading-overlay.css') }}">
    @vite('resources/js/app.js')
    @inertiaHead
    @routes
</head>

<body>

    <x-loading-overlay />

    @inertia

</body>


</html>
