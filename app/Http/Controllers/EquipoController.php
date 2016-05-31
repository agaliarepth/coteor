<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Models\Equipo;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('equipos.index');
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
        try {
            $status = 200;
            $msg = 'Registro exitoso';
            $carbon=new Carbon();
           if($request->ajax()){
               $e=new Equipo();
               $e->codigo=strtoupper($request["codigo"]);
               $e->marca=strtoupper($request["marca"]);
               $e->modelo=strtoupper($request["modelo"]);
               $e->descripcion=$request["descripcion"];
               $e->estado=1;
               $e->observaciones=$request['observaciones'];
               $e->fecha_alta=Carbon::now();
               $e->items_id=$request["items_id"];
               $e->save();
           }
        }
        catch(Exception $e){
            $status=404;
            $msg="Se produjo un error al guardar el registro";
        }
        finally{
            return response()->json([
                'status'=>$status,
                'msg'=>$msg
            ]);
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
           $e=Equipo::with('item')->get()->find($id);
           if(is_null($e))
               $status=404;

       }
       catch(Exception $e){
           $status=404;
       }
        finally{
            return response()->json([

                "status"=>$status,
                "equipo"=>$e,

            ]);
        }
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
        try{
            $status=200;
            $e=Equipo::find($id);
            $e->descripcion=$request->descripcion;
            $e->codigo=$request->codigo;
            $e->marca=$request->marca;
            $e->modelo=$request->modelo;
            $e->observaciones=$request->observaciones;
            $e->items_id=$request->items_id;
            $e->update();

        }
        catch(Exception $e){
            $status=404;
        }
        finally{

            return response()->json([
                "status"=>$status
            ]);
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
        try {
            $status=200;
            $e = Equipo::with('item')->get();

        }
        catch(Exception $e){
            $status=404;

        }
        finally{
            return response()->json([
                'data'=>$e->toArray(),
                'status'=>$status
            ]);
        }
    }
}
