<?php $drafts = ['homepage']; ?>

@extends('layouts.default', [
    'title' => 'Liste des drafts | Amarantia.fr',
    'description' => 'Liste les différents drafts (brouillons) du site'
])

@section('content')
    <h4>Drafts :</h4>
    <ul>
        @foreach($drafts as $draft)
            <li><a href="{{ route('draft', ['name' => $draft]) }}">{{ ucfirst($draft) }}</a></li>
        @endforeach
    </ul>
@stop
