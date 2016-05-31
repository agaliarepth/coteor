<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="newServicioModal" class="modal  fade">



    <div class="modal-dialog ">

        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Registrar Nuevo Servicio</h4>
            </div>
            <form role="form"   class="form-horizontal"id="createServicioForm" name="createServicioForm" enctype="multipart/form-data">
                <section class="panel">
                    <div class="panel-body">


                        <div class="form-group row">

                            <label class="col-md-2 control-label" for="">PLAN</label>
                            <div class="col-md-5">
                                <input type="text" placeholder="PLAN DE INTERNET" name="plan"id="plan" class="form-control">
                            </div>



                            <div class="col-md-3">

                                <select name="tipoacceso" id="tipoacceso" class="form-control">
                                    <option value="ADSL">ADSL</option>
                                    <option value="DIAL-UP">DIAL-UP</option>
                                    <option value="WIFI">WIFI</option>
                                    <option value="WI-MAX">WI-MAX</option>
                                </select>


                            </div>
                                </div>


                        <div class="form-group row">
                            <div class="col-md-6">
                            <label for=""class="col-md-4 control-label">  VELOCIDAD</label>
                            <div class="col-md-6 ">

                                        <select name="velocidad" id="velocidad" class="form-control">
                                            <option value="56">56 kbps</option>
                                            <option value="512">512 kbps </option>
                                            <option value="1024">1024 kbps</option>
                                            <option value="1536">1536 kbps</option>
                                            <option value="2048">2048 kbps</option>
                                            <option value="4096">4096 kbps</option>
                                            <option value="8192">8192 kbps</option>
                                        </select>
                                    </div>

                                </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 control-label">COSTO</label>
                            <div class="col-md-3">

                                <input type="text" name="costoinstalacion" id="costoinstalacion"class="form-control">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-md-2 control-label">HORAS LIBRES</label>
                            <div class="col-md-2">

                                <input type="text" name="horaslibres" id="horaslibres"class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-md-2 control-label ">TARIFA APLICADA</label>
                            <div class="col-md-4">
                                <label for="">PREPAGO<input type="radio" class=" radio-inline form-control"  name="tipopago" id="tipo1" value="PREPAGO"  checked/></label>
                                <label for="">POSTPAGO<input type="radio" class=" radio-inline form-control"  name="tipopago" id="tipo2" value="POSTPAGO"/></label>

                            </div>
                            <div class="col-md-2">
                            <label  for="" class=" form ">MONTO</label>
                            <input type="text" class="form-control" name="montopago" id="montopago">
                            </div>


                        </div>

                        <div class="form-group">
                            <label for="" class="col-md-2 control-label" >OBSERVACION</address></label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="observacion"  id="observacion" placeholder="observaciones">

                            </div>
                        </div>
                    </div>

                </section>

                <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
                    <button type="button" class="btn btn-success" onclick="guardar();"> <i class=" fa fa-floppy-o"></i> Guardar</button>
                </div>

            </form>
        </div>
</div>
    </div>

        <!--ALERTS-->
