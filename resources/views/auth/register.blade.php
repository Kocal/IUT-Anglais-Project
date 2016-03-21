<?php
$columns = ['md' => [4, 6]];
?>

@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                        {!! BootForm::openHorizontal($columns)->post()->action('/register')->enctype('multipart/form-data') !!}

                        {!! csrf_field() !!}
                        {!! BootForm::text("Pseudo", 'username') !!}
                        {!! BootForm::text('Adresse e-mail', 'email') !!}
                        {!! BootForm::file('Avatar', 'avatar') !!}
                        {!! BootForm::password('Mot de passe', 'password') !!}
                        {!! BootForm::password('Confirmation du mot de passe', 'password_confirmation') !!}
                        {!! BootForm::submit("<i class='fa fa-btn fa-user'></i> S'enregistrer", 'btn btn-primary') !!}
                        {!! BootForm::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
