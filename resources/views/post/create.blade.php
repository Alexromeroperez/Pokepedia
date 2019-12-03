@extends('index')
@section('content')

<form class="formulario" action="{{url('post')}}" method="POST">
  @csrf
  <input type="hidden" name="iduser" value="{{$iduser}}"/>
  <h3>Pokemon del post:</h3>
  <input type="hidden" id="json" value="{{$json}}"/>
  <select name="idpokemon">
    @foreach ($pokemons as $pokemon)
    <option value="{{$pokemon->id}}">{{$pokemon->nombre}}</option>
    @endforeach
  </select>
  
  
  <h3>Titulo del post:</h3> <input type="text" name="asunto" maxlength="50"/>
  @error('asunto')
    <div class="alert alert-danger">
        {{$message}}
        </div>
    @enderror
  
  <h3>Contenido del post:</h3>
  <textarea name="contenido"></textarea>
  @error('contenido')
    <div class="alert alert-danger">
        {{$message}}
        </div>
    @enderror
  <input type="submit" value="Crear Post">
</form>

@endsection