@extends('layouts.default', [
    'title' => 'Last videos | Amarantia.fr',
    'description' => 'Last videos hosted on Amarantia.fr'
])

@section('content')
    @if(count($videos) == 0)
        <p class="alert alert-info">
            PAS DE VIDEOS AAAAAAAAAAA
        </p>
    @else
        <div class="row">
            @foreach($videos as $video)
                <div class="col-md-4">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video controls>
                            <source type="video/webm" src="{{ asset('upload/videos/' . $video->file) }}"/>
                            <source type="video/mp4" src="{{ asset('upload/videos/' . $video->file) }}"/>
                        </video>
                    </div>
                    <h4><a href="{{ route('video::watch', [
                    'tag' => $video->tag
                ]) }}">{{ $video->title }}</a></h4>

                    <div class="user">
                        <img class="avatar avatar-tiny" src="{{ asset('upload/' . $video->user->avatar_url) }}"
                             alt="Avatar of {{ $video->user->username }}">
                        <b>{{ $video->user->username }}</b>,
                        <time pubdate="{{ $video->created_at }}">{{ $video->created_at->format('d/m/y \a\t h:i:s') }}</time>
                    </div>
                    <hr>
                </div>
            @endforeach
        </div>

        <div class="row text-center">
            {!! $videos->links() !!}
        </div>

    @endif
@stop
