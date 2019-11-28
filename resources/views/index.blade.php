<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/jumbotron.css') }}" rel="stylesheet">
        <link href="{{ url('assets/css/own.css') }}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="{{url('post/')}}">Pokepedia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                
                @auth
                <a class="btn" href ="{{url('post/')}}">Posts</a>
                <a class="btn" href ="{{url('post/create')}}">Crear Post</a>
                <a class="btn" href ="{{url('pokemon/')}}">Pokemons</a>
                    <form class="form-inline my-2 my-lg-0" action="{{url('logout')}}" method="post">
                                <input type="hidden" name="_token" value="9DeifAlvYDnJLZbJtHPyfSXr7xD6htZXoU5gpV4Q">   
                                @csrf
                                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">
                                    Logout
                                </button>
                            </form>
                    
                @else
                    
                    <a class="nav-link" href ="{{url('register')}}">Registrarse</a>
                @endauth
            </div>
        </nav>
        <main role="main">
            
            <div class="container">
                @yield('content')<!--crea un espacio que lo puedo rellenar en un archivo-->
            </div>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="{{url("assets/js/jquery-3.3.1.slim.min.js")}}"><\/script>')</script>
        <script src="{{url('assets/js/bootstrap.bundle.min.js')}}"></script>
    </body>
    <script type="text/javascript" src="{{url('assets/js/main.js')}}"></script>
</html>