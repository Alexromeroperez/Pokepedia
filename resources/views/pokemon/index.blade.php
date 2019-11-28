@extends('index')
@section('content')
    
        <div class="row centro">
            @foreach($pokemons as $pokemon)
            <div class="col-md-12 poke">
                
                <img class="imagen" src="{{$pokemon->img}}"/>
                <div class="datos">
                    <h2>Nombre</h2>
                    <p>{{$pokemon->nombre}}</p>
                    <h2>Peso</h2>
                    <p>{{$pokemon->peso}} Kg</p>
                    <h2>Estatura</h2>
                    <p>{{$pokemon->estatura}} cm</p>
                    
                </div>
                <div class="enlaces">
                    <a href="{{url('pokemon/'.$pokemon->id)}}">Ver Pokemon</a>
                    <a href="{{url('pokemon/'.$pokemon->id.'/edit')}}">Editar</a>
                    <form action="{{url('pokemon/'.$pokemon->id)}}" method="post" class="elimina">
                      @csrf
                      @method('DELETE')
                      <input class="btn btn-danger " type="submit" value="Borrar"/>
                    </form>
                </div>
            </div>
            @endforeach
            {{ $pokemons->links() }}
        </div>
        
@endsection