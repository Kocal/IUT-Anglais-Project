@extends('layouts.default', [
    'title' => e($video->title) . ' | Amarantia.fr',
    'description' => e($video->description) . ' | Video hosted on Amarantia.fr'
])

@section('content')

    <div class="col-md-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video controls>
                {{--<source type="video/webm" src="{{ asset('upload/videos/' . $video->file) }}"/>--}}
                <source type="video/mp4" src="{{ asset('upload/videos/' . $video->file) }}"/>
            </video>
        </div>
        <h2>{{ $video->title }}</h2>

        <div class="user">
            <img class="avatar" src="{{ asset('upload/' . $video->user->avatar_url) }}" alt="Avatar de {{ $video->user->username }}">
            Sent by <b>{{ $video->user->username }}</b>, on <time pubdate="{{ $video->created_at }}">{{ $video->created_at->toDayDateTimeString() }}</time>.
        </div>

        <hr>
        
    </div>

    <div class="col-md-4">
        <h3>Related videos</h3>
    </div>
@stop
