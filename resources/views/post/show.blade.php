@extends('index')
@section('content')
    <div class="row centro">
            <div class="col-md-12 poke">
                <div class="datos">
                    
                    <h2>{{$post->asunto}}</h2>
                    <p>Creado por: <a href="#">{{$post->user->name}}</a></p>
                    <p>Pokemon del post: <a href="{{url('pokemon/'.$post->pokemon->id)}}">{{$post->pokemon->nombre}}</a></p>
                    <p>{{$post->contenido}} </p>
                    @if($post->iduser === $user)
                    <a class="btn" href="{{url('post/'.$post->id.'/edit')}}">Editar</a>
                    <form action="post/{{$post->id}}" method="post" class="elimina">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-danger " type="submit" value="Borrar"/>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        <h1>Comentarios</h1>
        
        <div class="row centro">
            @foreach ($comentarios as $comentario)
            <div class="col-md-12 poke">
                
                <div class="comentarios">
                    <p>Creado por: <a href="#">{{$comentario->user->name}}</a></p>
                    <p>{{$comentario->comentario}} </p>
                    @if($comentario->iduser === $post->iduser)
                    <a class="btn" href="{{url('comentario/'.$comentario->id.'/edit')}}">Editar</a>
                    <form action="comentario/{{$comentario->id}}" method="post" class="elimina">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-danger " type="submit" value="Borrar"/>
                    </form>
                    @endif
                </div>
                
            </div>
            @endforeach
        </div>
        
@endsection