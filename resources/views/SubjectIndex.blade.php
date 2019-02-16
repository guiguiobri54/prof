@extends('AdminSchoolTemplate')


@section('contenu')

    <br>

    <div class="col-sm-offset-4 col-sm-4">

        @if(session()->has('ok'))

            <div class="alert alert-success alert-dismissible">{!! session('ok') !!}</div>

        @endif

        <div class="panel panel-primary">

            <div class="panel-heading">

                <h3 class="panel-title">Liste des matières</h3>

            </div>

            <table class="table">

                <thead>

                <tr>

                    <th>#</th>

                    <th>Matière</th>

                    <th>Attribut</th>



                </tr>

                </thead>

                <tbody>

                @foreach ($subjects as $sub)

                    <tr>

                        <td>{!! $sub->id !!}</td>

                        <td class="text-primary"><strong>{!! $sub->name !!}</strong></td>

                        <td class="text-primary"><strong>{!! $sub->attribute !!}</strong></td>



                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>



    </div>

@endsection