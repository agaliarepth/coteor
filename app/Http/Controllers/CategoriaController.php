<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categorias/index');
    }
 public function listar(Request $request){
         try{
        $statusCode=200;
        $c=Categoria::all();
          if(empty($c->ToArray()))
           $statusCode=600;
      if($request->ajax()){
       return response()->json(["categorias"=>$c->toArray(),"status"=>$statusCode]);
       }
       }
   catch(Exception $e){

       $statusCode=400;
        return response()->json(["status"=>$statusCode]);
}

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $msg='200';
        if($request->ajax()){
         $c=new Categoria();
         $c->descripcion=strtoupper($request['descripcion']);
         $c->codigo=strtoupper($request['codigo']);
         $c->save();



       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

          $c=Categoria::find($id);
         return response()->json(
         $c->toArray()
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
