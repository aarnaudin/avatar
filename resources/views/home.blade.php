@extends('layouts.app')

@section('content')
    <head>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="../public/css/style.css" rel="stylesheet">

    </head>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                        <?php
                            foreach ($errors->all() as $error)
                                {
                                    echo '<p class="errors">'.$error.'</p>';
                                }
                        ?>
            </div>

                <!-- Modal -->
                <div class="modal fade" id="addAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Ajout d'un avatar</h4>
                            </div>

                            <div class="modal-body">

                                    {!! Form::open((array('route'=>'addAvatar', 'method' => 'POST', 'files' => true))) !!}

                                    {!! Form::label('mail_name', 'Mail :') !!}
                                    {!! Form::text('mail') !!}

                                    <br><br>

                                    {!! Form::label('avatar_name', 'Ajouter un avatar (Format autorisés : jpeg, jpg ou png) :') !!}
                                    {!! Form::file('avatar') !!}

                                    <br>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                                    {!! Form::submit('Enregistrer', ['class' => 'btn btn-success'] ) !!}

                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div><br>


        <div class="row">
            @foreach ($mails as $m)
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading title_avatar">
                                <b>Adresse mail : <i>{{ $m -> adress }}</i></b>
                            </div>
                            <div class="panel-body title_avatar">
                                <img id="avatar_size" src="{{ $m -> url_avatar}}"/>
                            </div>
                            <div class="panel-footer">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteAvatar{{ $m -> id }}">
                                    Supprimer avatar
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteAvatar{{ $m -> id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Suppression d'un avatar</h4>
                                            </div>
                                            <div class="modal-body">
                                                Etes-vous sûr de vouloir supprimer cet avatar ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Non j'ai peur</button>
                                                <button type="button" class="btn btn-success">Oui j'ose</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>


    </div>
@endsection


