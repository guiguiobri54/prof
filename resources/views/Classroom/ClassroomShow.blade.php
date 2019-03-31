@extends('layouts.user')

@section('content')

    <div class="container-fluid">

        <div class="panel panel-default col-md-9">

            <div class="panel-heading"><h1> {{ $classroom->name }} </h1></div>

            <div class="panel-body">

                <div>

                    <section>

                    @include('Wall')

                    </section>
                </div>
            </div>
        </div>

        <div id="sidebar" class="col-md-3">

            <nav id="study" class="panel panel-primary">

                <div class="panel-heading"> <h4> {{ $classroom->subject }}</h4></div>

                <div class="panel-body">

                    @if(Auth::user()->role == '2')

                        {{link_to_route('Study.index', 'Gestionnaire de cours', null , ['class'=> 'btn btn-info center-block'])}}

                        <br>

                    @endif



                    @foreach($studies as $study)

                        <div id="main_dropdown" class="dropdown">
                            <button class="btn btn-default btn-block dropdown-toggle" type="button" data-toggle="dropdown">
                                <span class="caret pull-left"></span>  {{$study->name}}</button>
                            <ol class="dropdown-menu">

                                <li><button class="btn btn-default btn-block">Cours <span class="glyphicon glyphicon-list pull-right"></span></button> </li>
                                <ul id="cours">
                                    <li><a href=""> Les métaux</a></li>
                                    <li><a href="">Les électrons</a></li>

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


                    @if(Auth::user()->role == '2')

                        <div id="abc" class="form-group" style="display: none ">

                            {!! Form::open(['route'=> 'Study.store']) !!}

                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=> 'Libellé']) !!}

                            {!! Form::hidden('classroom_id',$classroom->id )!!}

                            <br>

                            {!! Form::submit('Créer', ['class' => 'btn btn-success pull-right']) !!}

                            {!! Form::close() !!}

                            <button id="cancel" class="btn btn-warning pull-left" onclick="div_hide()">Annuler</button>

                        </div>

                            <br>


                                <button id="popup" class="btn btn-success pull-right" onclick="div_show()">Nouveau cours</button>

                                   <script>
                                    //Function To Display Popup
                                    
                                   function div_show() {
                                   document.getElementById('abc').style.display = "block";
                                   document.getElementById('popup').style.display = "none";
                                   }
                                   //Function to Hide Popup
                                   function div_hide(){
                                   document.getElementById('abc').style.display = "none";
                                       document.getElementById('popup').style.display = "block";
                                   }
                                   </script>

                    @endif


                </div>

            </nav>

            <aside class="panel panel-info">

                <div class="panel-heading"> <h4> Infos</h4> </div>

                <div class="panel-body">

                    <ul>
                        <li>Prochaine évaluation</li>
                        <li>Devoir à rendre</li>
                        <li>blablabla</li>
                    </ul>

                        </div>

            </aside>

        </div>





    </div>






@endsection
