<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SEO App</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

    </head>
    @include ('header')
    <body class='min-vh-100 d-flex flex-column'>
        <main class = 'flex-grow-1'>
            <div class="container">
                <div class="urls-title">Сайт: {{$url->name}}</div>
            </div>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{$url->id}}</td>
                            </tr>
                            <tr>
                                <td>Имя</td>
                                <td>{{$url->name}}</td>
                            </tr>
                            <tr>
                                <td>Дата создания</td>
                                <td>{{$url->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="container">
                <div class="check-title">Проверки</div>
                <form method="POST" action="" class="d-flex checks-table">
                    @csrf
                    <input type="submit" class="btn btn-primary btn-checks" value="Запустить проверку">
                </form>
                <table class="table table-bordered table-hover text-nowrap">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Код ответа</th>
                            <th>h1</th>
                            <th>title</th>
                            <th>description</th>
                            <th>Дата создания</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    @include ('footer')
