@extends('layouts.default')

@section('content')
    <h1 class="page-header">Amarantia.fr</h1>

    <h2>What is Amarantia?</h2>
    <p><b>Amarantia.fr</b> is a fictive website created within a work in the <i>English module</i>
        of our <abbr title="Higher National Diploma">HND</abbr> Computer Science.</p>
    <p class="text-justify">
        It's a video-sharing platform website where an user can see, comments, share and uploads videos in its turn
        onto theplatform.
        It’s a free website, so our users will not going to paid in order to interact with <b>Amarantia.fr</b>.
        Moreover, we will not use some ads or suspicious methods to make profits on your back.</p>

    <h2>Our technologies</h2>
    <p><b>Amarantia.fr</b> is actually hosted on a <a href="https://www.kimsufi.com/fr/serveurs.xml">Kimsufi Server</a>
        (KS-2A), which has an <i>Intel Atom N2800</i>, <i>4 GB of <abbr title="Random Access Memory">RAM</abbr></i> and
        <i>4 GB of swap</i>, <i>2 TB of storage</i>,
        and <i>100 Mbps of download and upload rate</i>.
    </p>

    <p>Due to our weak <abbr title="Central Processing Unit">CPU</abbr> and less amount of RAM, we decided to run the
        webserver <b>nginx</b>
        on <b>Debian 8</b>, a Linux-based <abbr title="Operating System">OS</abbr> which doesn't consume a lot of
        material ressources.</p>

    <p>To make <b>Amarantia.fr</b> dynamic, we used the programming language <abbr title="PHP: HyperText Preprocessor">PHP 7.0</abbr>
        with
        <b>Laravel</b>, a PHP framework which has to goals to help us by writing a beautiful and comprehensible PHP
        code. To store our datas, we used a <b>MariaDB</b> database. And then, to store yours videos, we simply used the filesystem of
        the OS.<br>
    </p>
@stop
