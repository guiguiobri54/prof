@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Création d'un  cours</div>

            <div class="panel-body">

                <div class="col-sm-12">

                    {!! Form::open(['route' => 'Classroom.store', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Intitulé']) !!}

                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

                    </div>


                    <div class="form-group {!! $errors->has('attribute') ? 'has-error' : '' !!}">

                        {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => 'matière (optionel)']) !!}

                        {!! $errors->first('subject', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('attribute') ? 'has-error' : '' !!}">

                        {!! Form::text('school', null, ['class' => 'form-control', 'placeholder' => 'établissement (optionel)']) !!}

                        {!! $errors->first('school', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Créer', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection