@extends('layouts.app')

@section('content')
    <div class="container">

        {!! Form::open((array('route'=>'home.ajouter', 'method' => 'POST'))) !!}

        {!! Form::label('mail_name', 'Mail') !!}
        {!! Form::text('mail') !!}

        <br>

        {!! Form::label('title_name', 'Titre') !!}
        {!! Form::file('avatar') !!}

        <br>

        {!! Form::submit('Enregistrer!') !!}

        {!! Form::close() !!}


    </div>
@endsection

