<?php

namespace App\Http\Controllers;

use App\Post;
use App\Pokemon;
use App\Comentario;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id=\Auth::user()->id;
        return view('post.index')->with(['posts'=>Post::paginate(5),'user'=>$id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id=\Auth::user()->id;

        
        return view('post/create')->with(['pokemons'=>Pokemon::all(),
                                            'iduser'=>$id
                                            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $error='';
        $input=$request->validated();
        $post=new Post($input);
        try{
            $result=$post->save();
        }catch(\Exception $e){
            $error=['asunto'=>''.$e];
            return redirect('post/create')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(url('post/'))->with(['result'    =>  $result, 'op' =>  'store']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $id=\Auth::user()->id;
        $comentarios=Comentario::where('idpost',$post->id)->cursor();
        return view('post.show')->with(['post'=>$post,'comentarios'=>$comentarios,'user'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit')->with(['post'=>$post,'pokemons'=>Pokemon::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $input=$request->validated();
        $error='';
         try{
            $result=$post->update($input);
        }catch(\Exception $e){
            $error=['nombre'=>'El nombre utilizado ya existe'];
            return redirect('post/'.$post->id.'/edit')
                        ->withErrors($error)
                        ->withInput();
        }
        return redirect(url('post'))->with(['result'    =>  $result, 'op' =>  'update']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try{
            $post->delete();
            $result=true;
        }catch(\Exception $e){
            $result=false;
        }
        return redirect(url('post/'))->with(['result'    =>  $result, 'op' =>  'delete']);
    }
}
