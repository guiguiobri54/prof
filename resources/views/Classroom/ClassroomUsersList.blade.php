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
                                    <li><strong class="text-primary">{!! $studNb !!}</strong> inscrit(s) au cours</li>
                                    <li>"x" inscrits en ligne</li>
                                </ul>
                            </th>

                            <th><a href="{{route('ClassroomSubscription.index', [$classroom->id])}}" class="text-primary">{!! $reqNb !!} demandes d'admission</a></th>
                        </tr>

                        <tr>

                            <th>Nom</th>

                            <th>Prénom</th>

                            <th>Groupe</th>

                            <th>Dernière connection</th>


                        </tr>

                        </thead>

                        <tbody>


                        @foreach($students as $stud)
                            <tr>


                                <td>{!! $stud->last_name !!}</td>

                                <td>{!! $stud->first_name !!}</td>

                                <td></td>

                                <td></td>

                                <td><a class="btn btn-danger" onclick="return confirm('Exclure {!! $stud->first_name !!} {!! $stud->last_name !!} ?')" href="{{route('Classroom.banUser',[$classroom->id, $stud->id])}}">Exclure</a></td>

                        @endforeach
                            </tr>



                        </tbody>

                    </table>

                </div>


                    <a href="{{route('Classroom.index')}}" class="btn btn-primary">

                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

                    </a>


            </div>


@endsection