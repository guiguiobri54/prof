@extends('layouts.admin')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Modification d'un établissement</div>

            <div class="panel-body">

                <div class="col-sm-12">

                    {!! Form::model($school, ['route' => ['School.update', $school->id], 'method'=> 'put', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('country') ? 'has-error' : '' !!}">

                        {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Pays']) !!}

                        {!! $errors->first('country', '<small class="help-block">:message</small>') !!}

                    </div>


                    <div class="form-group {!! $errors->has('grade') ? 'has-error' : '' !!}">

                        {!! Form::text('grade', null, ['class' => 'form-control', 'placeholder' => 'grade']) !!}

                        {!! $errors->first('grade', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">

                        {!! Form::text('name', null,['class' => 'form-control', 'placeholder' => 'nom']) !!}

                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('department') ? 'has-error' : '' !!}">

                        {!! Form::text('department', null,['class' => 'form-control', 'placeholder' => 'departement']) !!}

                        {!! $errors->first('department', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('town') ? 'has-error' : '' !!}">

                        {!! Form::text('town', null,['class' => 'form-control', 'placeholder' => 'ville', 'type' => 'text-transform:uppercase']) !!}

                        {!! $errors->first('town', '<small class="help-block">:message</small>') !!}

                    </div>


                    {!! Form::submit('Modifier', ['class' => 'btn btn-warning pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection