@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-10">
      <form method="POST" action="store" id="form" name="form"   >
                 <section class="panel panel-default">
                  <header class="panel-heading">
                    <i class="fa fa-users"></i> Socios / Registro de socios
                  </header>
                        <div class="panel-body">
                            <div class="row">


                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Nombres</label>
                                      <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Apellido Paterno</label>
                                      <input type="text" class="form-control" name="apellidopaterno" id="apellidopaterno" placeholder="Apellido paterno">
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Apellido Materno</label>
                                      <input type="text" class="form-control" name="apellidomaterno" id="apellidomaterno" placeholder="Apellido materno">
                                  </div>
                              </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                    <label for="" >Num Carnet</address></label>
                                    <input type="text" class="form-control" name="ci"  required id="ci" placeholder="Carnet">
                                  </div>
                                  </div>
                                <div class="col-md-2">
                                  <div class="form-group">
                                      <label for="">Num Celular</label>
                                      <input type="text" class="form-control"  name="celular" id="celular" placeholder="Celular" >
                                  </div>
                                </div>

                                 <div class="col-md-4">
                                  <div class="form-group">
                                      <label for="">Email</label>
                                      <input type="text" class="form-control"  name="email" id="email" placeholder="Email">

                                  </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="col-md-2">
                             <div class="form-group">
                                 <label for="">Num Telefono</label>
                                 <input type="text" class="form-control"  name="numero" id="numero" placeholder="num telefono">
                             </div>
                           </div>
                           <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Zona</label>
                                <input type="text" class="form-control"  name="zona" id="zona" placeholder="Zona">
                            </div>
                          </div>
                          <div class="col-md-4">
                           <div class="form-group">
                               <label for="">Barrio</label>
                               <input type="text" class="form-control"  name="barrio" id="barrio" placeholder="Barrio">
                           </div>
                         </div>
                         <div class="col-md-4">
                          <div class="form-group">
                              <label for="">Direccion</label>
                              <input type="text" class="form-control"  name="direccion" id="direccion" placeholder="Direccion">
                          </div>
                        </div>
                             </div>

                              </div>
                              <div class="panel-footer">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token" />
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                                <button type="submit" class="btn btn-success" > <i class=" fa fa-floppy-o"></i> Guardar</button>
                              </div>
                          </form>
                    </section>
  </div>
</div>




@endsection
