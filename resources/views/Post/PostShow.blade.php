@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-1 col-sm-10">

        <br>

        <div class="panel panel-primary">

            <div class="panel-heading">{!! $post->title !!}</div>

            <div class="panel-body">

                <div class="col-sm-12">
                    <ul>
                        <li>{!! $classroom->name !!}</li>
                        <li>{!! $classroom->subject !!}</li>
                    </ul>
                </div>

                <div class="col-sm-12">

                    <div class="panel-body">
                        <p>{!! $post->content !!}</p>


                    </div>

                </div>

            </div>

        </div>

        <a href="javascript:history.back()" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection