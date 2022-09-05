<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>URLS</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    @include ('header')
    <body class='min-vh-100 d-flex flex-column'>
        @foreach ($urls as $url)
        <h3>{{$url->id}}</h3>
        <h4>{{$url->name}}</h4>
        <h5>{{$url->created_at}}</h5>
        @endforeach
    </body>
