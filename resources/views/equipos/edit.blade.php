<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Editar Equipo</h4>
            </div>
            <form role="form" id="editEquipoForm" class="form-horizontal" action="#" method="post">
                <section class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">ITEMS</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="items_descrip_edit"  name="items_descrip_edit" placeholder="codigo item" >
                                <input type="hidden" name="items_id_edit" id="items_id_edit" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">CODIGO</label>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control"  readonly id="codigoitem_edit" placeholder="">
                                    </div>
                                    <label for="" class="col-md-1 control-label">-</label>
                                    <div class="col-md-5">


                                        <input type="text" class="form-control" name="codigo_edit"id="codigo_edit"  placeholder="codigo">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-md-2 control-label" >DESCRIPCION</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="descripcion_edit"  name="descripcion_edit"  placeholder="Descripcion">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="" class="col-lg-2 control-label">DETALLES</label>
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="marca_edit"  name="marca_edit"  placeholder="marca">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="modelo_edit"  name="modelo_edit"  placeholder="modelo">
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="" class="col-md-2 control-label">OBSERVACION</label>
                            <div class="col-md-9">

                                <textarea  name="observaciones_edit" class="form-control" id="observaciones_edit"  maxlength="255"  value=""></textarea>
                            </div>
                        </div>



                    </div>
                </section>
            </form>
            <div class="modal-footer">
                <input type="hidden" name='_token' value='{{csrf_token()}}' id="token">
                <input type="hidden"  value='' id="idequipo" name="idequipo">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success" onclick="update();"> <i class=" fa fa-floppy-o"></i> Guardar</button>

            </div>

        </div>
    </div>
</div>
