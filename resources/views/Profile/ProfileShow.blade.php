@extends('layouts.user')


@section('content')

    <div class="col-sm-offset-3 col-sm-6">

        <br>

        <div class="panel panel-default">

            <div class="panel-heading">Profil:</div>

            <div class="panel-body" style="background-color: #c9e2b3">

                <div id="first_raw" style="display: flex">
                
                    <img src="{{asset('storage/pictures/avatars/' .  $profile->avatar)}}" style="height: 200px; width: 200px; border-radius: 50%; background-color: #d5d5d5">

                    <div id="primary_infos" style="margin-left: 20%">
                        <p>Prénom : {{ $profile->first_name }}</p>

                        <p>Nom : {{ $profile->last_name }}</p>

                        <p>Sexe : {{ $profile->gender }}</p>

                        <p>Statut : {{ $profile->user_type }}</p>
                        <p>Membre depuis le: {{$profile->created_at->format('d/m/Y')}}</p>
                        <p>Dernière connexion: {{$profile->last_login_at}}</p>
                    </div>
                </div>
                <br>
                <div id="teaching" style="background-color: white">
                    Domaines d'enseignement: blabla
                </div>
                <br>
                <div id="about_me" class="panel" style="border-radius: 25%; padding: 10%; padding-top: 3%">
                    <div class="panel-heading" style="text-align: center"><h4>A propos de moi:</h4></div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut blandit dolor. Suspendisse vulputate imperdiet ante nec condimentum. Donec rhoncus, lorem nec ultrices placerat, libero nisi congue magna, a iaculis lectus nunc sed magna. Nullam vulputate neque at lorem rhoncus, eget accumsan magna tristique. Pellentesque bibendum, leo at lacinia suscipit, tortor libero faucibus odio, viverra vehicula lectus ex et tellus. Proin et risus semper, eleifend eros eget, egestas lectus. In tincidunt tellus sit amet dictum pellentesque. Vestibulum diam sapien, fermentum ac tempor a, fringilla viverra risus. Pellentesque pretium augue erat, ut rutrum sapien rhoncus vulputate. Nunc at finibus magna. Nullam quis odio at lorem aliquet cursus quis eget massa. </p>
                </div>
                <br>
                <div id="classrooms" class="panel">
                    <div class="panel-heading">Classes</div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Intitulé</th>
                                <th>Matière</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>


            </div>
            <div class="panel-footer">
                <a>Signaler cet utilisateur</a>
            </div>

        </div>

        <a href="{{route('TeacherHome')}}" class="btn btn-primary">

            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour

        </a>

    </div>

@endsection