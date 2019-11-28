<?php

namespace App\Http\Controllers;

use App\HabilidadPokemon;
use Illuminate\Http\Request;

class HabilidadPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos=HabilidadPokemon::paginate(20);
        return view('habilidadPokemon')->with(['habilidadpokemon'=>HabilidadPokemon::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habilidadPokemon/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $error='';
        $input=$request->validated();
        $pokemon=new Habilidad($input);
        try{
            $result=$pokemon->save();
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('habilidadPokemon/create')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('habilidadPokemon'))->with(['result'    =>  $result, 'op' =>  'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HabilidadPokemon  $habilidadPokemon
     * @return \Illuminate\Http\Response
     */
    public function show(HabilidadPokemon $habilidadPokemon)
    {
        return view('habilidadPokemon.show')->with(['habilidadPokemon'=>$habilidadPokemon]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HabilidadPokemon  $habilidadPokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(HabilidadPokemon $habilidadPokemon)
    {
        return view('habilidadPokemon.edit')->with(['habilidadPokemon'=>$habilidadPokemon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HabilidadPokemon  $habilidadPokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HabilidadPokemon $habilidadPokemon)
    {
         $input=$request->validated();
        $error='';
         try{
            $result=$habilidadPokemon->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('habilidadPokemon/'.$habilidadPokemon->id.'/edit')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('habilidadPokemon'))->with(['result'    =>  $result, 'op' =>  'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HabilidadPokemon  $habilidadPokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(HabilidadPokemon $habilidadPokemon)
    {
        try{
            $habilidadPokemon->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('habilidadPokemon'))->with(['result'    =>  $result, 'op' =>  'delete']);
    }
}
