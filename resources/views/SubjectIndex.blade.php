@extends('layouts.admin')


@section('content')

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Liste des matières</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Matière</th>

                    <th>Attribut</th>

                    <th> </th>

                    <th> </th>



                </tr>

                </thead>

                <tbody>

                @foreach ($subjects as $sub)

                    <tr>

                        <td>{!! $sub->id !!}</td>

                        <td class="text-primary"><strong>{!! $sub->name !!}</strong></td>

                        <td class="text-primary"><strong>{!! $sub->attribute !!}</strong></td>

                        <td>{!! link_to_route('Subject.edit', 'Modifier', [$sub->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['Subject.destroy', $sub->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer cette matière ?\')']) !!}

                            {!! Form::close() !!}

                        </td>



                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

            {!! link_to_route('Subject.create', 'Ajouter une matière', [], ['class' => 'btn btn-info pull-right']) !!}

            {!! link_to_route('AdminHome', 'Retour au menu', [], ['class' => 'btn btn-default pull-left']) !!}

    </div>

@endsection