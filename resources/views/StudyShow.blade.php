
@extends('layouts.user')


@section('content')

    <br>

    <div class="col-sm-offset-0 col-sm-12">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-default">

            <div class="panel-heading">

                <h3 class="panel-title">Mes cours:</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>Tag</th>

                    <th>Intitulé</th>

                    <th>Docs Cours <button id="add" class="btn" style="background-color: transparent" onclick="div_show()"><span  style=color:green style="" class="glyphicon glyphicon-plus-sign"></span></button></th>

                    <th>Docs Annexes <button id="add" class="btn" style="background-color: transparent" onclick="div_show2()"><span  style=color:green style="" class="glyphicon glyphicon-plus-sign"></span></button></th>

                    <th>Docs Exercices <button id="add" class="btn" style="background-color: transparent" onclick="div_show3()"><span  style=color:green style="" class="glyphicon glyphicon-plus-sign"></span></button></th>

                    <th></th>

                    <th></th>

                    <th></th>

                </tr>

                </thead>

                <tbody>


                    <tr>

                        <td class="text-primary"><strong>Terminal S</strong></td>

                        <td>{!! $study->name !!}</td>

                        <td> <ul>
                                @foreach($lessons as $lesson)
                                    <li><a href="{{$lesson->path}}"> {{$lesson->filename}}</a></li>
                                    @endforeach
                                        <br>

                                <div id="form" style="display: none" class="form-group  {!! $errors->has('file') ? 'has-error' : '' !!}">

                                    <button id="cancel" class="btn-xs btn-default pull-right" onclick="div_hide()"><span  class="glyphicon glyphicon-triangle-top"></span> </button>

                                    <li>

                                        {!! Form::open(['action' => 'DocumentController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                        {!! Form::file('file', null, ['class' => 'form-control']) !!}

                                        {!! $errors->first('file', '<small class="help-block">:message</small>') !!}

                                        {!! Form::hidden('category','lesson' )!!}

                                        {!! Form::hidden('study_id',$study->id )!!}

                                            <br>

                                        {{ Form::button('<span  class="glyphicon glyphicon-save-file">   Ajouter</span>', array('class'=>'btn-sm btn-success', 'type'=>'submit')) }}

                                        {!! Form::close() !!}


                                    </li>
                                </div>
                            </ul>
                            <script>
                                //Display form

                                function div_show() {

                                    document.getElementById('form').style.display = "block";
                                }
                                //Hide form
                                function div_hide(){
                                    document.getElementById('form').style.display = "none";
                                }
                            </script>

                        </td>

                        <td><ul>

                                @foreach($annexes as $annexe)
                                    <li><a href="{{$annexe->path}}"> {{$annexe->filename}}</a></li>
                                @endforeach
                                    <br>

                                    <div id="form2" style="display: none" class="form-group  {!! $errors->has('file') ? 'has-error' : '' !!}">

                                        <button id="cancel2" class="btn-xs btn-default pull-right" onclick="div_hide2()"><span  class="glyphicon glyphicon-triangle-top"></span> </button>

                                        <li>

                                            {!! Form::open(['action' => 'DocumentController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                            {!! Form::file('file', null, ['class' => 'form-control']) !!}

                                            {!! $errors->first('file', '<small class="help-block">:message</small>') !!}

                                            {!! Form::hidden('category','annexe' )!!}

                                            {!! Form::hidden('study_id',$study->id )!!}

                                            <br>

                                            {{ Form::button('<span  class="glyphicon glyphicon-save-file">   Ajouter</span>', array('class'=>'btn-sm btn-success', 'type'=>'submit')) }}

                                            {!! Form::close() !!}


                                        </li>
                                    </div>

                                    <script>
                                        //Display form

                                        function div_show2() {

                                            document.getElementById('form2').style.display = "block";
                                        }
                                        //Hide form
                                        function div_hide2(){
                                            document.getElementById('form2').style.display = "none";
                                        }
                                    </script>

                            </ul>
                        </td>

                        <td>
                            <ul>
                                @foreach($exercices as $exercice)
                                    <li><a href="{{$exercice->path}}"> {{$exercice->filename}}</a></li>
                                @endforeach
                                <br>

                                <div id="form3" style="display: none" class="form-group  {!! $errors->has('file') ? 'has-error' : '' !!}">

                                    <button id="cancel3" class="btn-xs btn-default pull-right" onclick="div_hide3()"><span  class="glyphicon glyphicon-triangle-top"></span> </button>

                                    <li>

                                        {!! Form::open(['action' => 'DocumentController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                                        {!! Form::file('file', null, ['class' => 'form-control']) !!}

                                        {!! $errors->first('file', '<small class="help-block">:message</small>') !!}

                                        {!! Form::hidden('category','exercice' )!!}

                                        {!! Form::hidden('study_id',$study->id )!!}

                                        <br>

                                        {{ Form::button('<span  class="glyphicon glyphicon-save-file">   Ajouter</span>', array('class'=>'btn-sm btn-success', 'type'=>'submit')) }}

                                        {!! Form::close() !!}


                                    </li>
                                </div>
                                    @push('scripts')
                                    <script>
                                        //Display form

                                        function div_show3() {

                                            document.getElementById('form3').style.display = "block";
                                        }
                                        //Hide form
                                        function div_hide3(){
                                            document.getElementById('form3').style.display = "none";
                                        }
                                    </script>
                                        @endpush(s)
                            </ul>

                        </td>


                        <td>{!! link_to_route('Classroom.edit', 'Modifier', [$study->id], ['class' => 'btn btn-warning btn-block']) !!}</td>

                        <td>

                            {{ Form::open(['method' => 'DELETE', 'route' => ['Classroom.destroy', $study->id]]) }}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger btn-block', 'onclick' => 'return confirm(\'Vraiment supprimer ce cours ?\')']) !!}

                            {!! Form::close() !!}

                        </td>

                        <td>{!! link_to_route('upload.file', 'Ajouter un fichier',[$study->id], ['class' => 'btn btn-success']) !!}</td>

                    </tr>

                </tbody>

            </table>

        </div>



        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>


    </div>

@endsection




