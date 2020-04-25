@foreach($posts as $post)
    <article class="panel" style="width: 100%; background-color: powderblue">
        <div style="display: flex; justify-content: space-between">
            <a href="{{route('Post.show',[$classroom->id, $post->id])}}"><h1>{!! $post->title !!}</h1></a>
            <div style="height: 80%; display: flex">
                @can('update', $post)<a class="btn btn-default" href="{{route('Post.edit',[$classroom->id, $post->id])}}">Editer</a>@endcan
                @can('delete', $post)<div>{{ Form::open(['method' => 'DELETE', 'route' => ['Post.destroy', $post->id]]) }}

                    {!! Form::submit('Supprimer', ['class' => 'btn btn-default', 'onclick' => 'return confirm(\'Voulez vous vraiment supprimer ce cours ?\')']) !!}

                    {!! Form::close() !!}
                </div>@endcan
            </div>
        </div>
        <p>{!! $post->content !!}</p>
        <footer>{!! $post->updated_at !!}</footer>
    </article>
    @endforeach

