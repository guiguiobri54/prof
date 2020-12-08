@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-2 col-sm-7">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Mes classes:</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>Intitulé</th>

                    <th>Matière</th>

                    <th>Etablissement</th>

                    <th>Professeur</th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach ($allClassrooms as $class)

                    <tr>

                        <td class="text-primary"><strong>{!! $class->name !!}</strong></td>

                        <td>{!! $class->subject !!}</td>

                        <td>{!! $class->school !!}</td>

                        <td> {!! $class->creator !!}
                             <a style="margin-left: 5%" href="{{route('Profile.show', [$class->user_id])}}" class="btn btn-default">

                                <span class="glyphicon glyphicon-user"></span>

                            </a>
                        </td>


                        <td>{!! link_to_route('ClassroomSubscription.create', 'Rejoindre', [$class->id], ['class' => 'btn btn-success btn-block']) !!}</td>

                        <td>{!! link_to_route('Classroom.show', 'Inscrits', [$class->id], ['class' => 'btn btn-default btn-block']) !!}</td>




                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>


            <a href="{{route('StudentHome')}}" class="btn btn-primary">

                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>


    </div>

@endsection