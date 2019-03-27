@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Profil:</div>

            <div class="panel-body">

                <p>Prénom : {{ $profile->first_name }}</p>

                <p>Nom : {{ $profile->last_name }}</p>

                <p>Genre : {{ $profile->gender }}</p>

                <p>Statut : {{ $profile->user_type }}</p>


            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection