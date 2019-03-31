@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-2 col-sm-7">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Mes cours:</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>Intitulé</th>

                    <th>Matière</th>

                    <th>Etablissement</th>

                    <th></th>

                    <th></th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach ($classroom as $class)

                    <tr>

                        <td class="text-primary"><strong>{!! $class->name !!}</strong></td>

                        <td>{!! $class->subject !!}</td>

                        <td>{!! $class->school !!}</td>

                        <td>{!! link_to_route('Classroom.show', 'Voir', [$class->id], ['class' => 'btn btn-success btn-block']) !!}</td>

                        <td>{!! link_to_route('Classroom.show', 'Inscrits', [$class->id], ['class' => 'btn btn-default btn-block']) !!}</td>

                        <td>{!! link_to_route('Classroom.edit', 'Modifier', [$class->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['Classroom.destroy', $class->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce cours ?\')']) !!}

                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {!! link_to_route('Classroom.create', 'Ajouter une classe', [], ['class' => 'btn btn-info pull-right']) !!}

            <a href="{{route('TeacherHome')}}" class="btn btn-primary">

                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>


    </div>

@endsection