@extends('layouts.default', [
    'title' => 'Ajouter une vidéo | Amarantia.fr'
])

@section('content')
    {!! BootForm::open()->multipart() !!}

    <div class="col-md-6 col-md-push-6">
        <h2>Ajouter une vidéo</h2>
        {!! BootForm::file('Vidéo (*.webm, *.mp4, *.mp4v, *.mpg4)', 'video')
                    ->accept('video/webm,video/mp4,video/mp4v,video/mpg4')->class('video-picker') !!}

        {!! BootForm::text("Titre", 'title') !!}

        {!! BootForm::textarea("Description", 'description') !!}

        {!! BootForm::select('Catégorie', 'category')->options($categories) !!}

        {!! BootForm::submit("<i class='fa fa-btn fa-upload'></i> Send", 'btn btn-primary') !!}
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
