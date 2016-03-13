<!doctype html>
<html lang="fr">
<head>
    <title>{{ $title or 'Amarantia.fr' }}</title>
    <meta charset="utf-8">
    <meta name="description" content="{{ $description or 'Site de partage de vidéos' }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}" media="screen, projection"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100' rel='stylesheet' type='text/css'>
</head>
<body id="page">

<header id="page__header" role="banner">
    <nav class="navbar navbar-fixed-top navbar-default">
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

            <form class="navbar-right navbar-form">
                <div class="form-group">
                    <a href="#" class="btn btn-default">Se connecter</a>
                    <a href="#" class="btn btn-primary">S'inscrire</a>
                </div>
            </form>
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
</body>
</html>
