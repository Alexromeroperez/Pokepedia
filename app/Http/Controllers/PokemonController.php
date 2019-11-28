<?php

namespace App\Http\Controllers;

use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Requests\PokemonRequest;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('pokemon.index')->with(['pokemons'=>Pokemon::paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PokemonRequest $request)
    {
        $error='';
        $input=$request->validated();
        $pokemon=new Pokemon($input);
        try{
            $result=$pokemon->save();
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('pokemon/create')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('pokemon.index'))->with(['result'    =>  $result, 'op' =>  'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show')->with(['pokemon'=>$pokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit')->with(['pokemon'=>$pokemon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(PokemonRequest $request, Pokemon $pokemon)
    {
        $input=$request->validated();
        $error='';
         try{
            $result=$pokemon->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('pokemon/'.$pokemon->id.'/edit')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('pokemon'))->with(['result'    =>  $result, 'op' =>  'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        try{
            $vehiculo->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(url('pokemon/'))->with(['result'    =>  $result, 'op' =>  'delete']);
    }
}
