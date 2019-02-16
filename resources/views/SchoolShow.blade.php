@extends('AdminSchoolTemplate')


@section('contenu')

    <div class="col-sm-offset-4 col-sm-4">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">Détails</div>

            <div class="panel-body">

                <p>Pays : {{ $school->country }}</p>

                <p>Grade : {{ $school->grade }}</p>

                <p>Nom : {{ $school->name }}</p>

                <p>Dep : {{ $school->department }}</p>

                <p>Ville : {{ $school->town }}</p>


            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection