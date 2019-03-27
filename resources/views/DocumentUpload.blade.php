@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Ajout d'un fichier</div>

            <div class="panel-body">

                <div class="col-sm-12">


                    {!! Form::open(['action' => 'DocumentController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


                    <div class="form-group {!! $errors->has('file') ? 'has-error' : '' !!}">

                        {!! Form::file('file', null, ['class' => 'form-control']) !!}

                        {!! $errors->first('file', '<small class="help-block">:message</small>') !!}

                    </div>


                    <div class="form-group {!! $errors->has('category') ? 'has-error' : '' !!}">

                        {!!  Form::select('category', ['lesson' => 'Cours', 'annexe' => 'Annexe', 'exercise' => 'Exercice'],  'student', ['class' => 'form-control' ]) !!}

                        {!! $errors->first('category', '<small class="help-block">:message</small>') !!}

                        {!! Form::hidden('study_id', $idStudy)!!}

                    </div>

                    {!! Form::submit('Ajouter', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection