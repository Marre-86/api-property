<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <script>window.Laravel = {csrfToken: '{{ csrf_token() }}'}</script>
        <title>Villa Verify - Real Property Register</title>
        <!-- Scripts -->
        @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    </head>
    <body class="container-fluid">
        <div id="app">

        </div>
    </body>
</html>