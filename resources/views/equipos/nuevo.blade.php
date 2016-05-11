<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Registrar Categoria</h4>
            </div>
            <form role="form"  action="#" method="post">
                <section class="panel">
                    <div class="panel-body">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" required  placeholder="codigo">
                        </div>
                    </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="" >Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" required name="descripcion"placeholder="Descripcion">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" >Marca</label>
                                <input type="text" class="form-control" id="marca"  name="marca" placeholder="marca">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" >Modelo</label>
                                <input type="text" class="form-control" id="modelo"  name="modelo" placeholder="modelo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="" >Items</label>
                                <input type="text" class="form-control" id="items_id"  name="items_id" placeholder="codigo item">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Observacion</label>
                                <textarea  name="observaciones" class="form-control" id="observaciones"  maxlength="255" value=""></textarea>
                            </div>
                        </div>


                    </div>
                </section>
            </form>
            <div class="modal-footer">
                <input type="hidden" name='_token' value='{{csrf_token()}}' id="token">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                <button type="button" class="btn btn-success" onclick="guardar();"> <i class=" fa fa-floppy-o"></i> Guardar</button>

            </div>

        </div>
    </div>
</div>
