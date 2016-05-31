<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Socio;
use App\Models\Telefono;
class SocioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('socios.index');
    }
    public function listar(Request $request){

      $socios=Socio::all();
      if($request->ajax()){
             return  response()->json([
              "data"=>$socios
            ]);

               }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socios.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

     $socio=new Socio();
     $socio->nombres=$request['nombres'];
     $socio->apellidopaterno=$request['apellidopaterno'];
     $socio->apellidomaterno=$request['apellidomaterno'];
     $socio->ci=$request['ci'];
     $socio->celular=$request['celular'];
     $socio->email=$request['email'];
     $socio->save();

     $t=new Telefono();
     $t->tipolinea='principal';
     $t->numero=$request['numero'];
     $t->zona=$request['zona'];
     $t->barrio=$request['barrio'];
     $t->direccion=$request['direccion'];
     $t->socios_id=$socio->id;
     $t->save();
       return redirect('socios');
        //dd($request->all());


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
        //
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
        //
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
    public  function autocompletar(Request $request){
        $term= $request['term'];

        $i=Socio::where('apellidopaterno', 'LIKE', '%'.$term.'%')->orWhere('ci', 'LIKE', '%'.$term.'%')->get();
        return response()->json($i);
    }
}
