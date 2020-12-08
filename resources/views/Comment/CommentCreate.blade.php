

    <div class="col-sm-offset-1 col-sm-10">

        <br>

        <div class="panel panel-primary">

            <div class="panel-body">

                <div class="col-sm-12">

                    {!! Form::open(['route' => 'Comment.store', 'class' => 'form-horizontal panel']) !!}

                    <input type="hidden" value="{{$post->id}}" name="post">

                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">

                        {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Votre commentaire:']) !!}

                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Publier', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}

                    <span class="btn btn-warning" ONCLICK="div_hide()">Annuler</span>

                </div>

            </div>

        </div>


    </div>

