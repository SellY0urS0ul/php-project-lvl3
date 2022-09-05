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
                    <div class="pagination-container container">
                        <div class="col pagination-text">
                            <p>Showing {{$urls->firstItem()}} to {{$urls->lastItem()}} of {{$urls->total()}} results</p>
                        </div>
                        <div class="col btns">
                            <ul class='pagination'>
                    <?php
                    $urlNextPageNumber = $urls->currentPage() + 1;
                    $urlPreviousPageNumber = $urls->currentPage() - 1;
                    if ($urls->onFirstPage()) {?>
                        <li class='page-item previous disabled'><a href=''> < </a></li>
                        <li class='page-item current-number disabled'><a href=''> {{$urls->currentPage()}} </a></li>
                        <li class='page-item next-number'><a href='{{$urls->nextPageUrl()}}'> {{$urlNextPageNumber}} </a></li>
                        <li class='page-item next'><a href='{{$urls->nextPageUrl()}}'> > </a></li>
                    <?php
                    }
                    elseif ($urls->hasMorePages()) {?>
                        <li class='page-item previous'><a href='{{$urls->previousPageUrl()}}'> < </a></li>
                        <li class='page-item previous-number'><a href='{{$urls->previousPageUrl()}}'> {{$urlPreviousPageNumber}} </a></li>
                        <li class='page-item next-number'><a href='{{$urls->nextPageUrl()}}'> {{$urlNextPageNumber}} </a></li>
                        <li class='page-item next'><a href='{{$urls->nextPageUrl()}}'> > </a></li>
                        <?php
                    } else {?>
                        <li class='page-item previous'><a href='{{$urls->previousPageUrl()}}'> < </a></li>
                        <li class='page-item previous-number'><a href='{{$urls->previousPageUrl()}}'> {{$urlPreviousPageNumber}} </a></li>
                        <li class='page-item next-number disabled'><a href='{{$urls->nextPageUrl()}}'> {{$urls->currentPage()}} </a></li>
                        <li class='page-item next disabled'><a href='{{$urls->nextPageUrl()}}'> > </a></li>
                        <?php
                    }
                    ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    @include ('footer')
