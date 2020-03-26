@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Demande d'inscription au cours</div>

            <div class="panel-body">

                <div class="col-sm-12">
                    <ul>
                        <li>{!! $classroom->name !!}</li>
                        <li>{!! $classroom->subject !!}</li>
                        <li>De: {!! $classroom->creator !!}</li>
                        <li>Etablissement: {!! $classroom->school !!}</li>

                    </ul>
                </div>

                <div class="col-sm-12">

                    {!! Form::open(['route' => 'ClassroomSubscription.store', 'class' => 'form-horizontal panel']) !!}

                    <input type="hidden" value="{{$classroom->id}}" name="classroom">

                    <div class="form-group {!! $errors->has('message') ? 'has-error' : '' !!}">

                        {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => 'Message:']) !!}

                        {!! $errors->first('message', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Envoyer', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection