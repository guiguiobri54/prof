@extends('layouts.admin')


@section('content')

    <br>

    <div class="col-sm-offset-3 col-sm-6">

        <div class="panel panel-success">

            <div class="panel-heading">Modifié !</div>

            <div class="panel-body">

                L'établissement scolaire a été modifié avec succès !

            </div>

        </div>

        <div class="btn btn-default">

            <a href={{route('School.index')}} >

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

            </a>
        </div>

    </div>

@endsection