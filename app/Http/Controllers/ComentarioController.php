<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos=Comentario::paginate(10);
        return view('comentario')->with(['comentario'=>Comentario::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comentario/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComentarioRequest $request)
    {
        $error='';
        $input=$request->validated();
        $comentario=new Comentario($input);
        try{
            $result=$comemtario->save();
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('comentario/create')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('comentario'))->with(['result'    =>  $result, 'op' =>  'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function show(Comentario $comentario)
    {
        return view('comentario.show')->with(['comentario'=>$comentario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentario $comentario)
    {
        return view('comentario.edit')->with(['comentario'=>$comentario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function update(ComentarioRequest $request, Comentario $comentario)
    {
         $input=$request->validated();
        $error='';
         try{
            $result=$comentario->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('comentario/'.$comentario->id.'/edit')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(route('comentario'))->with(['result'    =>  $result, 'op' =>  'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentario $comentario)
    {
        try{
            $comentario->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(route('comentario'))->with(['result'    =>  $result, 'op' =>  'delete']);
    }
}
