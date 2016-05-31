<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Registrar Equipo</h4>
            </div>
            <form role="form" id="nuevoEquipoForm" class="form-horizontal" action="#" method="post">
                <section class="panel ">
                    <div class="panel-body">


                            <div class="form-group">
                                <label for="" class="col-md-2 control-label">ITEMS</label>
                                <div class="col-md-4">
                                <input type="text" class="form-control" id="items_descrip"  name="items_descrip" placeholder="codigo item">
                                <input type="hidden" name="items_id" id="items_id">
                                    </div>
                            </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">CODIGO</label>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control"  readonly id="codigoitem" placeholder="">
                                    </div>
                                    <label for="" class="col-md-1 control-label">-</label>
                                    <div class="col-md-5">


                                        <input type="text" class="form-control" name="codigo"id="codigo"  disabled placeholder="codigo">
                                    </div>
                                </div>
                            </div>
                        </div>


                            <div class="form-group">
                                <label for="" class="col-md-2 control-label" >DESCRIPCION</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control" id="descripcion"  name="descripcion" disabled placeholder="Descripcion">
                                 </div>
                            </div>


                            <div class="form-group">
                                <label for="" class="col-lg-2 control-label">DETALLES</label>
                                <div class="col-md-8">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="marca"  name="marca" disabled placeholder="marca">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="modelo"  name="modelo" disabled placeholder="modelo">
                                        </div>
                                        </div>
                                    </div>
                            </div>



                            <div class="form-group">
                                <label for="" class="col-md-2 control-label">OBSERVACION</label>
                                <div class="col-md-9">

                                    <textarea  name="observaciones" class="form-control" id="observaciones"  maxlength="255" disabled value=""></textarea>
                                </div>
                            </div>



                    </div>
                </section>
            </form>
            <div class="modal-footer">
                <input type="hidden" name='_token' value='{{csrf_token()}}' id="token">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success" onclick="store();"> <i class=" fa fa-floppy-o"></i> Guardar</button>

            </div>

        </div>
    </div>
</div>
