



                    {!! Form::open(['route' => 'CommentReply.store', 'class' => 'form-horizontal panel']) !!}

                    <input type="hidden" value="{{$post->id}}" name="post">
                    <input type="hidden" value="{{$comment->id}}" name="comment">

                    <div class="form-group {!! $errors->has('content') ? 'has-error' : '' !!}">

                        {!! Form::text('content', null, ['class' => 'form-control', 'placeholder' => 'Votre réponse:']) !!}

                        {!! $errors->first('content', '<small class="help-block">:message</small>') !!}

                    </div>

                    {!! Form::submit('Publier', ['class' => 'btn btn-success pull-right']) !!}

                    {!! Form::close() !!}





