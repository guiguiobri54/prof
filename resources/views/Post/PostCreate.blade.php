@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-1 col-sm-10">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Création d'une publication</div>

            <div class="panel-body">

                <div class="col-sm-12">
                    <ul>
                        <li>{!! $classroom->name !!}</li>
                        <li>{!! $classroom->subject !!}</li>
                    </ul>
                </div>

                <div class="col-sm-12">

                    {!! Form::open(['route' => 'Post.store', 'class' => 'form-horizontal panel']) !!}

                    <input type="hidden" value="{{$classroom->id}}" name="classroom">

                    <div class="form-group {!! $errors->has('title') ? 'has-error' : '' !!}">

                        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Titre:']) !!}

                        {!! $errors->first('title', '<small class="help-block">:message</small>') !!}

                    </div>

                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">

                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Message:']) !!}

                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}

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