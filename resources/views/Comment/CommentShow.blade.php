

    <div class="col-sm-offset-1 col-sm-11" style="padding-top: 0px">

        <div class="panel panel-primary">

            <div class="panel-body">
                @foreach($comments as $comment)
                    <div id="commentBlock" style="padding: 1%">
                        <div id="avatar"></div>

                        <div id="comment_display">
                            <h4>{!! $firstN = \App\User::find($comment->user_id)->first_name !!} {!! $lastN = \App\User::find($comment->user_id)->last_name !!}
                                <span style="font-size: small">le {!! $comment->updated_at->format('d/m/Y H:i:s') !!}</span>
                            </h4>

                            <p>{!! $comment->content !!}</p>

                        </div>
                        <button class="btn btn btn-primary ReplyLink" data-id="{{$comment->id}}" style="font-size: small" onclick=""><span>Répondre</span></button>
                        <div id="createReply-{{$comment->id}}" style="display: none" >@include('Comment.CommentReplyCreate')</div>


                        @foreach($comment->replies as $reply)
                            <div id="reply_display">
                                <h4>{!! $firstN = \App\User::find($reply->user_id)->first_name !!} {!! $lastN = \App\User::find($reply->user_id)->last_name !!}
                                    <span style="font-size: small">le {!! $reply->updated_at->format('d/m/Y H:i:s') !!}</span>
                                </h4>

                                <p>{!! $reply->content !!}</p>
                            </div>
                        @endforeach

                    </div>

                @endforeach


                    <script>

                        $(document).ready(function() {
                            $(".ReplyLink").click(function () {


                                let $toggle = $(this);

                                //console.log(toggle);

                                let id = "createReply-"+ $toggle.data('id');

                                console.log(id);

                                let e = "#"+ id;

                                console.log(e);

                                //let ok = document.getElementById(id);

                                $(e).toggle('hide');
                                //return false;


                                /* if(document.getElementById(id).style.display === "none"){
                                     ok.style.display = 'block';
                                 }

                                 else if (document.getElementById(id).style.display === "block"){
                                     console.log('blabla');
                                     ok.style.display = "none";
                                 }*/




                            });
                        });



                    </script>
            </div>

        </div>

    </div>

