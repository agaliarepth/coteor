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

    public function listar(Request $request)
    {
        try {
            $statusCode = 200;
            $c = Categoria::all();
            if (empty($c->ToArray()))
                $statusCode = 600;
            if ($request->ajax()) {
                return response()->json(["categorias" => $c->toArray(), "status" => $statusCode]);
            }
        } catch (Exception $e) {

            $statusCode = 400;
            return response()->json(["status" => $statusCode]);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules=[
            "descripcion"=>"required",
//            "pu"=>"required|numeric",
            "codigo"=>"unique:categorias,codigo",
//            "categorias_id"=>"exists:categorias,id"
        ];
        $messages=[
            "descripcion.required"=>"El campo Descripcion esta vacio",

            "codigo.unique"=>"El codigo de esta categoria ya existe"
        ];

        $validator=\Validator::make($request->all(),$rules,$messages);

        try {
            $status = '200';
            $msg=array("Registro exitoso.");
            if ($request->ajax()) {
                if($validator->fails()){
                    $status=500;
                    $msg=$validator->messages()->all();
                }
                else {
                    $c = new Categoria();
                    $c->descripcion = strtoupper($request['descripcion']);
                    $c->codigo = strtoupper($request['codigo']);
                    $c->save();
                }
            }
        }
        catch(Exception $e){
            $status=500;
            $msg[]='Ah ocurrido un error al Guardar el registro';
        }
        finally{
            return response()->json(['status'=>$status,"msg"=>$msg]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $c = Categoria::find($id);
        return response()->json(
            $c->toArray()
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       /* $rules=[
            "descripcion"=>"required",
            "codigo"=>"unique:categorias,codigo",
        ];
        $messages=[
            "descripcion.required"=>"El campo Descripcion esta vacio",

            "codigo.unique"=>"El codigo de esta categoria ya existe"
        ];
        $validator=\Validator::make($request->all(),$rules,$messages);*/

        try {
            $c=Categoria::find($id);
            $status = '200';
            $msg=array("Actualizacion exitosa.");
            if ($request->ajax()) {
                    $c->descripcion = strtoupper($request['descripcion']);
                    $c->codigo = strtoupper($request['codigo']);
                    $c->save();
                }
            }
        catch(Exception $e){
            $status=500;
            $msg[]='Ah ocurrido un error al Guardar el registro';
        }
        finally{
            return response()->json(['status'=>$status,"msg"=>$msg]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
