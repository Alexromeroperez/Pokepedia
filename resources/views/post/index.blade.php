@extends('index')
@section('content')
        <div class="row centro">
            @foreach($posts as $post)
            <div class="col-md-12 poke">
                <div class="datos">
                    
                    <h2>{{$post->asunto}}</h2>
                    <p>Creado por: <a href="{{url('user/'.$post->iduser)}}">{{$post->user->name}}</a></p>
                    <p>Pokemon del post: <a href="{{url('pokemon/'.$post->pokemon->id)}}">{{$post->pokemon->nombre}}</a></p>
                    <p>{{$post->contenido}} </p>
                    <a class="btn" href="{{url('post/'.$post->id)}}">Ver Post</a>
                    <a class="btn" href="{{url('post/'.$post->id.'/edit')}}">Editar</a>
                    <form action="post/{{$post->id}}" method="post" class="elimina">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-danger " type="submit" value="Borrar"/>
                    </form>
                </div>
            </div>
            @endforeach
            {{ $posts->links() }}
        </div>
        
@endsection