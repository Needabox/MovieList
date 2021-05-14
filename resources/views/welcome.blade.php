<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gradient-to-br from-purple-900 to-indigo-900 flex-wrap items-center justify-center min-h-screen">
        
        <h1><a href="{{ route('movies.index') }}" class="flex text-white-50">Movies</a></h1>
    </body>
</html>
