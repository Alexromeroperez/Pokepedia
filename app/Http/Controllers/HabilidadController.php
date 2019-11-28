<?php

namespace App\Http\Controllers;

use App\Habilidad;
use Illuminate\Http\Request;

class HabilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos=Habilidad::paginate(20);
        return view('habilidad.index')->with(['habilidad'=>Habilidad::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('habilidad/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HabilidadRequest $request)
    {
        $error='';
        $input=$request->validated();
        $habilidad=new Habilidad($input);
        try{
            $result=$habilidad->save();
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('habilidad/create')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('habilidad'))->with(['result'    =>  $result, 'op' =>  'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function show(Habilidad $habilidad)
    {
        return view('habilidad.show')->with(['habilidad'=>$habilidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Habilidad $habilidad)
    {
        return view('habilidad.edit')->with(['habilidad'=>$habilidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function update(HabilidadRequest $request, Habilidad $habilidad)
    {
        $input=$request->validated();
        $error='';
         try{
            $result=$habilidad->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('habilidad/'.$habilidad->id.'/edit')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('habilidad'))->with(['result'    =>  $result, 'op' =>  'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Habilidad  $habilidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Habilidad $habilidad)
    {
        try{
            $habilidad->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('habilidad'))->with(['result'    =>  $result, 'op' =>  'delete']);
    }
}
