@extends('layouts.user')

@section('content')

<div class="container-fluid">


    <div id="sidebar" class="col-md-3">

        <nav id="study" class="panel panel-primary">

            <div class="panel-heading"> <h4> liste</h4></div>

            <div class="panel-body">

                @foreach($studies as $study)

                    <div id="main_dropdown" class="dropdown">
                        <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret pull-left"></span>  {{$study->name}}</button>
                        <ol class="dropdown-menu">

                            <li><button class="btn btn-default btn-block">Cours <span class="glyphicon glyphicon-list pull-right"></span></button> </li>
                                <ul id="cours">
                                    <li>Les métaux</li>
                                    <li>Les électrons</li>
                                </ul>

                            <li><button class="btn btn-default btn-block">Annexes<span class="glyphicon glyphicon-list pull-right"></span></button></li>
                                <ul id="annexes">
                                    <li>Index abréviation métaux</li>
                                    <li>Formules de calcul</li>
                                </ul>

                            <li><button class="btn btn-default btn-block">Exercices<span class="glyphicon glyphicon-list pull-right"></span></button></li>
                                <ul id="exercices">
                                    <li>EX métaux</li>
                                    <li>EX électrons</li>
                                </ul>
                        </ol>


                    </div>
                    <br>



                @endforeach
            </div>

        </nav>

    </div>

</div>

@endsection


