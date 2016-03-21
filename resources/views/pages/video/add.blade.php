@extends('layouts.default', [
    'title' => 'Ajouter une vidéo | Amarantia.fr'
])

@section('content')
    {!! BootForm::open()->enctype('multipart/form-data') !!}
    <div class="col-md-6 col-md-push-6">
        <h2>Ajouter une vidéo</h2>
        {!! BootForm::file('Vidéo (webm, mp4)', 'video')->accept('video/webm,video/mp4')->class('video-picker') !!}
        {!! BootForm::text("Titre", 'title') !!}
        {!! BootForm::textarea("Description", 'description') !!}
        {!! BootForm::submit("<i class='fa fa-btn fa-upload'></i> Envoyer", 'btn btn-primary') !!}
        {!! BootForm::close() !!}
    </div>

    <div class="col-md-6 col-md-pull-6">
        <h2>Aperçu</h2>
        <div class="embed-responsive embed-responsive-16by9">
            <video controls autoplay muted></video>
        </div>
    </div>

    {!! BootForm::close() !!}
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}"></script>
@stop
