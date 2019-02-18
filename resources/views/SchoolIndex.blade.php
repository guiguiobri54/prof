@extends('layouts.admin')


@section('content')

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Liste des établissements</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Nom</th>

                    <th></th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach ($schools as $school)

                    <tr>

                        <td>{!! $school->id !!}</td>

                        <td class="text-primary"><strong>{!! $school->name !!}</strong></td>

                        <td>{!! link_to_route('School.show', 'Voir', [$school->id], ['class' => 'btn btn-success btn-block']) !!}</td>

                        <td>{!! link_to_route('School.edit', 'Modifier', [$school->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['School.destroy', $school->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cet établissement ?\')']) !!}

                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {!! link_to_route('School.create', 'Ajouter un établissement', [], ['class' => 'btn btn-info pull-right']) !!}

            {!! link_to_route('AdminHome', 'Retour au menu', [], ['class' => 'btn btn-default pull-left']) !!}

        {!! $links !!}

    </div>

@endsection