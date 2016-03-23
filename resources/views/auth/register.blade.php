<?php
$columns = ['md' => [4, 6]];
?>

@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Sign up on Amarantia.fr</div>
                    <div class="panel-body">
                        {!! BootForm::openHorizontal($columns)->post()->action('/register')->enctype('multipart/form-data') !!}

                        {!! csrf_field() !!}
                        {!! BootForm::text("Username", 'username') !!}
                        {!! BootForm::text('Email address', 'email') !!}
                        {!! BootForm::file('Avatar', 'avatar') !!}
                        {!! BootForm::password('Password', 'password') !!}
                        {!! BootForm::password('Password (confirmation)', 'password_confirmation') !!}
                        {!! BootForm::submit("<i class='fa fa-btn fa-user'></i> Sign up", 'btn btn-primary') !!}
                        {!! BootForm::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
