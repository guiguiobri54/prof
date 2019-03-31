@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-1 col-sm-10">

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


                </tr>

                </thead>

                <tbody>

                    @foreach ($studies as $study)

                        <tr>

                            <td class="text-primary"><strong>{{ $study->tag }}</strong></td>

                            <td><strong>{!! $study->name !!}</strong></td>

                            <td> <ul>
                                    @foreach($study->lessons as $doc)
                                    <li>{{$doc->filename}}</li>
                                        @endforeach



                                </ul>

                            </td>

                            <td> <ul>
                                    @foreach($study->annexes as $doc)
                                        <li>{{$doc->filename}}</li>
                                    @endforeach

                                </ul>

                            </td>

                            <td> <ul>
                                    @foreach($study->exercises as $doc)
                                        <li>{{$doc->filename}}</li>
                                    @endforeach

                                </ul>

                            </td>

                            <td>{!! link_to_route('Study.show', 'Détails', [$study->id], ['class' => 'btn btn-default btn-block']) !!}</td>


                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

        {!! link_to_route('Study.create', 'Ajouter un cours', [], ['class' => 'btn btn-info pull-right']) !!}

            <a href="{{route('TeacherHome')}}" class="btn btn-primary">

                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>


    </div>

@endsection