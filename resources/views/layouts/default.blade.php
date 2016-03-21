<!doctype html>
<html lang="fr">
<head>
    <title>{{ $title or 'Amarantia.fr' }}</title>
    <meta charset="utf-8">
    <meta name="description" content="{{ $description or 'Site de partage de vidéos' }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" media="screen, projection"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
</head>
<body id="page">

<header id="page__header" role="banner">
    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">Amarantia.fr</a>
            </div>

            @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('video::add') }}">Ajouter une vidéo</a></li>

                    <li class="dropdown user-container">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img class="avatar" src="{{ url('upload/' . Auth::user()['avatar_url']) }}">
                            {{ Auth::user()['username'] }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Action</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Se déconnecter</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <form class="navbar-right navbar-form">
                    <div class="form-group">
                        <a href="{{ url('/login') }}" class="btn btn-default">
                            <i class="fa fa-btn fa-sign-in"></i> Se connecter</a>
                        <a href="{{ url('/register') }}" class="btn btn-primary">S'inscrire</a>
                    </div>
                </form>
            @endif

            <ul class="nav navbar-nav navbar-right">
                <li><a href="">Toast</a></li>
            </ul>
        </div>
    </nav>
</header>

<main id="page__main" role="main">
    <div class="container">
        @yield('content')
    </div>
</main>

<footer id="page__footer" role="contentinfo">
    <div class="container">
        <p>Amarantia.fr</p>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@yield('js')
</body>
</html>
