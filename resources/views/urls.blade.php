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

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    @include ('header')
    <body class='min-vh-100 d-flex flex-column'>
        <main class = 'flex-grow-1'>
            <div class="container">
                <div class="urls-title">Сайты</div>
            </div>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Последняя проверка</th>
                            </tr>
                            @foreach ($urls as $url)
                            <tr>
                                <th>{{$url->id}}</th>
                                <th>
                                    <a href="/urls/{{$url->id}}">{{$url->name}}</a>
                                </th>
                                <th>{{$url->created_at}}</th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </body>
    @include ('footer')
