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


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" >Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" required name="descripcion"placeholder="Descripcion categoria">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Codigo</label>
                                <input type="text" name="codigo" class="form-control" id="codigo" required  placeholder="Codigo"  value="">
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
