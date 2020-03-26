@extends('layouts.user')


@section('content')

        <br>


            <div class="col-sm-offset-2 col-sm-7">

                @if(session()->has('ok'))

                    <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

                @endif

                <div class="panel panel-default">

                    <div class="panel-heading">

                        <h3 class="panel-title">{{$classroom->name}}:</h3>

                    </div>

                    <table class="table">

                        <thead>

                        <tr>
                            <th>Etudiants inscrits:
                                <ul>
                                    <li>"x" inscrits au cours</li>
                                    <li>"x" inscrits actuellement en ligne</li>
                                </ul>
                            </th>
                            <th></th>
                            <th></th>
                            <th>{!! link_to_route('ClassroomSubscription.index', 'Requêtes d admission', [$classroom->id]) !!}</th>
                        </tr>

                        <tr>

                            <th>Nom</th>

                            <th>Prénom</th>

                            <th>Groupe</th>

                            <th>Dernière connection</th>


                        </tr>

                        </thead>

                        <tbody>



                            <tr>

                                <td></td>

                                <td></td>

                                <td></td>

                                <td></td>


                            </tr>



                        </tbody>

                    </table>

                </div>


                    <a href="{{route('Classroom.index')}}" class="btn btn-primary">

                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

                    </a>


            </div>


@endsection