@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification d'un Cours</div>

            <div class="panel-body">

                <div class="col-sm-12">

                    {!! Form::model($study, ['route' => ['Study.update', $study->id], 'method'=>'put', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Intitulé du cours']) !!}

                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

                    </div>


                    <div class="form-group {!! $errors->has('tag') ? 'has-error' : '' !!}">

                        {!! Form::text('tag', null, ['class' => 'form-control', 'placeholder' => '(optionnel) tag de référence: ex: Seconde, Terminal S...']) !!}

                        {!! $errors->first('tag', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Modifier', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection