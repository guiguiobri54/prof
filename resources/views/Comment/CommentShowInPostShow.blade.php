

    <div class="col-sm-offset-1 col-sm-11" style="padding-top: 0px">

        <div class="panel panel-primary">

            <div class="panel-body" style="background-color: #f9f9f9">
                @foreach($comments as $comment)
                 <div id="CommentBlockParent" style="padding: 1%; display: flex">

                     <div id="avatar" style="height: 40px; width: 40px; background-color: #5e5e5e"></div>
                     <div id="CommentBlockChild">
                         <div id="comment_display">
                             <h4>{!! $firstN = \App\User::find($comment->user_id)->first_name !!} {!! $lastN = \App\User::find($comment->user_id)->last_name !!}
                                 <span style="font-size: small">le {!! $comment->updated_at->format('d/m/Y H:i:s') !!}</span>
                             </h4>

                             <p>{!! $comment->content !!}</p>

                         </div>
                         <button class="btn btn btn-primary ReplyLink" data-id="{{$comment->id}}" style="font-size: small" ><span>Répondre</span></button>
                         <div id="createReply-{{$comment->id}}" style="display: none" >@include('Comment.CommentReplyCreate')</div>
                         <br>
                         @if($comment->replies->count() > 0)
                             <a href="#" class="RepliesShowLink" data-id="{{$comment->id}}" style="margin-left: 5%">Voir les réponses à ce commentaire</a>
                         @endif


                         @foreach($comment->replies as $reply)
                             <div id="replyDisplay-{{$comment->id}}" style="margin-left: 5%; display: none">
                                 <h4>{!! $firstN = \App\User::find($reply->user_id)->first_name !!} {!! $lastN = \App\User::find($reply->user_id)->last_name !!}
                                     <span style="font-size: small">le {!! $reply->updated_at->format('d/m/Y H:i:s') !!}</span>
                                 </h4>

                                 <p>{!! $reply->content !!}</p>
                             </div>
                         @endforeach
                     </div>
                     <div id="CommentParam">
                         @can('update', $comment)<a class="btn btn-default" href="{{route('Comment.edit',[$post->id, $comment->id])}}">Editer</a>@endcan
                     </div>



                </div>

                @endforeach
                    <script>

                        $(document).ready(function() {
                            //toggle pour repondre à un commentaire
                            $(".ReplyLink").click(function () {


                                let $toggle = $(this);

                                //console.log(toggle);

                                let id = "createReply-"+ $toggle.data('id');

                                console.log(id);

                                let e = "#"+ id;

                                console.log(e);

                                $(e).toggle('hide');

                            });

                            //toggle pour afficher les reponses à un commentaire
                            $(".RepliesShowLink").click(function () {


                                let $toggle2 = $(this);

                                //console.log(toggle2);

                                let id2 = "replyDisplay-"+ $toggle2.data('id');

                                console.log(id2);

                                let e2 = "#"+ id2;

                                console.log(e2);

                                $(e2).toggle('hide');

                            });
                        });



                    </script>
            </div>

        </div>

    </div>

