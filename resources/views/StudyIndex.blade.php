@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-2 col-sm-9">

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

                    <th>Tag</th>

                    <th>Intitulé</th>

                    <th>Docs Cours</th>

                    <th>Docs Annexes</th>

                    <th>Docs Exercices</th>

                    <th></th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach ($studies as $study)

                    <tr>

                        <td class="text-primary"><strong>Terminal S</strong></td>

                        <td><strong>{!! $study->name !!}</strong></td>

                        <td> <ul>
                                @foreach($study->lessons as $doc)
                                <li>{{$doc->filename}}</li>
                                    @endforeach



                            </ul>

                        </td>

                        <td> <ul>
                                <li><a href="">Indexmétaux.pdf</a></li>
                                <li><a href="">Formules.pdf</a></li>

                            </ul>

                        </td>

                        <td> <ul>
                                <li><a href="">Ex1.pdf</a></li>
                                <li><a href="">Ex2.pdf</a></li>

                            </ul>

                        </td>

                        <td>{!! link_to_route('Study.show', 'Détails', [$study->id], ['class' => 'btn btn-default btn-block']) !!}</td>

                        <td>{!! link_to_route('Study.edit', 'Modifier', [$study->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['Study.destroy', $study->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce cours ?\')']) !!}

                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

        {!! link_to_route('Study.create', 'Ajouter un cours', [], ['class' => 'btn btn-info pull-right']) !!}

            <a href="javascript:history.back()" class="btn btn-primary">

                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>


    </div>

@endsection