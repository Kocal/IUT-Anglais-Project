@extends('layouts.default')

@section('content')
    {!! BootForm::open() !!}

    <div class="col-md-5">
        <h2>Aperçu</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <video controls autoplay></video>
        </div>
    </div>
    <div class="col-md-7">
        <h2>Ajouter une vidéo</h2>
        {!! BootForm::file('Vidéo (webm, mp4)', 'video')->accept('video/webm,video/mp4,video/*') !!}
        {!! BootForm::text("Titre", 'title') !!}
        {!! BootForm::textarea("Description", 'description') !!}
        {!! BootForm::submit("<i class='fa fa-btn fa-upload'></i> Envoyer", 'btn btn-primary') !!}
        {!! BootForm::close() !!}
    </div>

    {!! BootForm::close() !!}

@stop
