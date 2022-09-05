
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
        <div class='container main-container text-center'>
            <div class="row">
                <div class ='col'>
                    <div class ='title'> Анализатор страниц </div>
                </div>
            </div>
            <div class='row'>
                <div class='col'>
                    <div class='desc'> Бесплатно проверяйте сайты на SEO пригодность </div>
                    <div class ='form'>
                    <form method="POST" action="{{route('url.addsubmit')}}" class="d-flex justify-content-center">
                        @csrf
                        <input type="text" name="url[name]" value="" class="form-control name form-control-lg" placeholder="https://www.example.com">
                        <input type="submit" class="btn btn-primary btn-lg ms-3 px-5 text-uppercase mx-3" value="Проверить">
                    </form>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </body>
    @include ('footer')
