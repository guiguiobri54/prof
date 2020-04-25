@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-2 col-sm-7">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Demande(s) d'inscription en attente:</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>Nom</th>

                    <th>Prénom</th>

                    <th>Date</th>

                    <th>Message</th>

                    <th></th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>

                @foreach ($ClassroomSub as $Sub)

                    <tr>

                        <td class="text-primary"><strong>{!! $Sub->last_name !!}</strong></td>

                        <td>{!! $Sub->first_name !!}</td>

                        <td>{!! $Sub->created_at !!}</td>

                        <td>{!! $Sub->message !!}</td>

                        <td>{!! link_to_route('ClassroomSubscription.show', 'Voir', [$classroom->id, $Sub->id], ['class' => 'btn btn-info btn-block']) !!}</td>

                        <td>{!! link_to_route('ClassroomSubscription.accept', 'Accepter', [$classroom->id, $Sub->id, $Sub->user_id], ['class' => 'btn btn-success btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['ClassroomSubscription.destroy', $Sub->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Supprimer cette requête d admission ?\')']) !!}

                            {!! Form::close() !!}

                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>



            <a href="{{route('Classroom.usersList', [$classroom->id])}}" class="btn btn-primary">


                <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>


    </div>

@endsection