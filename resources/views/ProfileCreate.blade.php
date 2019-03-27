@extends('layouts.app')

@section('content')
    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-default">

            <div class="panel-heading">Pour continuer, veuillez créer votre profil: </div>

            <div class="panel-body">

                <div class="col-sm-12">

                    {!! Form::open(['route'=> 'Profile.store', 'class'=> 'form-horizontal panel' ]) !!}

                    <div class="form-group {!! $errors->has('gender') ? 'has-error' : '' !!}">

                        {!! Form::label('gender', 'Vous êtes:', ['class' => 'col-lg-4 control-label'] )  !!}

                        <br>
                        <br>

                        {!! Form::radio('gender', 'male' )!!} un homme

                        {!! Form::radio('gender', 'female')!!} une femme

                        {!! $errors->first('gender', '<small class="help-block">:message</small>') !!}


                    </div>

                    <div class="form-group {!! $errors->has('first_name') ? 'has-error' : '' !!}">

                        {!! Form::text('first_name', null, ['class'=>'form-control', 'placeholder'=> 'Prénom']) !!}

                        {!! $errors->first('first_name', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('last_name') ? 'has-error' : '' !!}">

                        {!! Form::text('last_name', null, ['class'=> 'form-control', 'placeholder'=> 'Nom']) !!}

                        {!! $errors->first('last_name', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('statut') ? 'has-error' : '' !!}">

                        {!! Form::label('statut', 'Votre Statut:', ['class' => 'col-lg-4 control-label'] )  !!}

                        <br>
                        <br>

                        {!!  Form::select('statut', ['student' => 'Etudiant', 'teacher' => 'Professeur'],  'student', ['class' => 'form-control' ]) !!}

                        {!! $errors->first('statut', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Créer', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>






@endsection