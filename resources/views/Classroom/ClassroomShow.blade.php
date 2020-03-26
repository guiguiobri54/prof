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
                                    @foreach($study->lessons as $doc)
                                        <li>{{$doc->filename}}</li>
                                        <br>
                                    @endforeach

                                </ul>

                                <li><button class="btn btn-default btn-block">Annexes<span class="glyphicon glyphicon-list pull-right"></span></button></li>
                                <ul id="annexes">
                                    @foreach($study->annexes as $doc)
                                    <li>{{$doc->filename}}</li>
                                        <br>
                                    @endforeach
                                </ul>

                                <li><button class="btn btn-default btn-block " role="button" aria-pressed="true">Exercices<span class="glyphicon glyphicon-list pull-right"></span></button></li>
                                <ul id="exercices">
                                    @foreach($study->exercises as $doc)
                                        <li>{{$doc->filename}}</li>
                                        <br>
                                    @endforeach
                                </ul>
                            </ol>


                        </div>
                        <br>

                    @endforeach


                    @if(Auth::user()->role == '2')

                        <div id="abc" class="form-group" style="display: none ">

                            <select id="sel" name="tag" class="form-control">
                                <option value="">Trier par tag</option>
                                @foreach($tags as $tag)
                                    <option value="{{$tag}}"> {{$tag}}</option>
                                @endforeach
                            </select>



                            <br>

                            <button id="try" class="btn-default" style="display: none">test </button>






                                {!! Form::open(['route'=> 'Study.attach']) !!}

                                {!! Form::select('study', $list, null, ['class'=>'form-control', 'placeholder'=>'Selectionner un cours']) !!}

                                {!! Form::hidden('classroom_id',$classroom->id )!!}



                            <br>


                            {!! Form::submit('Importer', ['class' => 'btn btn-success pull-right']) !!}

                            {!! Form::close() !!}

                            <button id="cancel" class="btn btn-warning pull-left" onclick="div_hide()">Annuler</button>
                        </div>

                            <script>

                               //let slug = $("select[name='tag']");
                                //let selection = $("select[name='study']");

                                //on attend chargement complet de la page
                                $(function(){

                                    //on récupère notre collection d'objets cours dans une variable javascript
                                    let cours = $.parseJSON('<?php echo addslashes(json_encode($cours))?>');

                                    console.log(cours);

                                    //on ajoute un event sur le choix d'un tag
                                    $('#sel').on('change',function(){

                                        $('#try').css('display','block');

                                        //on prepare les options pour le second select
                                        //on cherche la valeur
                                        let tagSelected = $(this).val();
                                        //on va trié
                                        let options = {}; // defini la var comme object
                                        $.each(cours,function(key,cour){
                                            if(cour.tag === tagSelected){ //cour['tag']
                                                options[cour.id] = cour.name;
                                            }
                                        });
                                        console.log(options);
                                        //on affiche les options sur le deuxieme sselect
                                        //d'abord on efface les anciennes options
                                        $("select[name='study']").empty();
                                        //on ajoute les options
                                        $.each(options,function(id,label){
                                            $("select[name='study']").append('<option value="'+id+'">'+label+'</option>')
                                        });

                                    });
                                });


                            </script>

                            <br>


                                <button id="popup" class="btn btn-success pull-right" onclick="div_show()">Ajouter un cours</button>

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
