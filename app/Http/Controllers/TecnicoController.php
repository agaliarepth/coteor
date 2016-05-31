<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Tecnico;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tecnicos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $status=200;
            $t=new Tecnico();
            $t->nombres=strtoupper($request->nombres);
            $t->apellidos=strtoupper($request->apellidos);
            $t->ci=$request->ci;
            $t->celular=$request->celular;
            $t->telefono=$request->telefono;
            $t->direccion=strtoupper($request->direccion);
            $t->email=$request->email;
            $t->estado=1;
            $t->funcion=$request->funcion;
            $t->save();
        }
        catch (Exception $e){
            $status=500;

        }
        finally{
            return response()->json(['status'=>$status]);
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
        try{
            $status=200;
            $t=Tecnico::find($id);
        }
        catch (Exception $e){
            $status=500;
        }
        finally{
            return response()->json(['status'=>$status,'data'=>$t]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        try{
            $status=200;
            $t=Tecnico::find($request->id);
            $t->nombres=strtoupper($request->nombres_edit);
            $t->apellidos=strtoupper($request->apellidos_edit);
            $t->ci=$request->ci_edit;
            $t->celular=$request->celular_edit;
            $t->telefono=$request->telefono_edit;
            $t->direccion=strtoupper($request->direccion_edit);
            $t->email=$request->email_edit;
            $t->estado=1;
            $t->funcion=$request->funcion_edit;
            $t->update();

        }
        catch (Exception $e){
            $status=500;
        }
        finally{
            return response()->json(['status'=>$status]);
        }
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
    public function listar(){
        $data=Tecnico::all();
        return  response()->json(['data'=>$data]);
    }
    public function autocompletar(Request $request)
    {
        $term= $request['term'];

        $t=Tecnico::where('nombres', 'LIKE', '%'.$term.'%')->orWhere('apellidos', 'LIKE', '%'.$term.'%')->orWhere('ci', 'LIKE', '%'.$term.'%')->where('estado','=','ALTA')->get();
        return response()->json($t);
    }
}
