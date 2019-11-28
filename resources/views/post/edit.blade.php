@extends('index')
@section('content')

<form class="formulario" action="{{url('post/'.$post->id)}}" method="POST">
  @csrf
  @method('PUT')
  <input type="hidden" name="iduser" value="{{$post->iduser}}"/>
  <h3>Pokemon del post:</h3>
  
  <select name="idpokemon">
    @foreach ($pokemons as $pokemon)
      @if($post->idpokemon == $pokemon->id)
        <option selected value="{{$pokemon->id}}">{{$pokemon->nombre}}</option>
      @else
        <option value="{{$pokemon->id}}">{{$pokemon->nombre}}</option>
      @endif
    @endforeach
  </select>
  
  
  <h3>Titulo del post:</h3> <input type="text" name="asunto" maxlength="50" value="{{$post->asunto}}"/>
  @error('asunto')
    <div class="alert alert-danger">
        {{$message}}
        </div>
    @enderror
  
  <h3>Contenido del post:</h3>
  <textarea name="contenido">{{$post->contenido}}</textarea>
  @error('contenido')
    <div class="alert alert-danger">
        {{$message}}
        </div>
    @enderror
  <input type="submit" value="Editar Post">
</form>

@endsection