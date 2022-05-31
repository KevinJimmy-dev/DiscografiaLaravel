<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/style.css">
        <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

        <title>@yield('title')</title>
    </head>

    <body class="background-img">

        <div class="container mt-3 px-5">

            <div class="bg-white main">
                <header>
                    <abbr title="Página Inicial">
                        <a href="{{ route('index.discography') }}">
                            <img src="/img/logo.png" alt="" class="img-logo">
                        </a>
                    </abbr>
                    <h1 class="title-page">@yield('titleH1')</h1>
                </header>
            </div>

            <div class="mb-0">

                @if (session('success'))
                    <div class="alert alert-success text-center mb-0" role="alert">
                        <p class="msg-success">{{ session('success') }}</p>
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger text-center mb-0" role="alert">
                        <p class="msg-error">{{ session('error') }}</p>
                    </div> 
                @endif
                
            </div>
            
            <div class="content px-4 pt-3">
                @yield('content')
            </div>

        </div>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <script src="https://kit.fontawesome.com/09a5251690.js" crossorigin="anonymous"></script>

    </body>

</html>
