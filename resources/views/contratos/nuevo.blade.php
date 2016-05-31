@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-10">
        <form method="POST" action="store" action="" class="form-horizontal" id="newContratoForm">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-file"></i> Contratos / Registro de Contrato
        </div>

        <div class="panel-body">

                <div class="form-group ">

                    <label class="control-label col-md-2" for="email">NUM CONTRATO:</label>
                    <div class="col-md-8">
                    <div class="form-group row ">
                    <div class="col-md-2">
                        <input type="text" name="numcontrato" class="form-control" id="numcontrato" placeholder="" required>
                    </div>

                        <label class="control-label col-md-2" for="email">FECHA:</label>
                        <div class="col-md-3">
                            <input type="text" readonly="" class="form-control default-date-picker" name="fecha" id="fecha" value="">
                           <span class="input-group-btn add-on">
                              <button class="btn btn-primary" type="button"><i class="fa fa-calendar"></i></button>
                           </span>
                        </div>


                        <label class="control-label col-md-2" for="email">TIPO:</label>
                           <div class="col-md-3">
                            <select  id="tipo_contrato" class="form-control" name="tipo_contrato">
                                <option value="ALTA DE CONTRATO">ALTA DE CONTRATO</option>
                            </select>
                           </div>
                        </div>
                    </div>



                </div>

                <div class="form-group ">
                    <label for=""class="control-label col-md-2">TIPO DE SERVICIOS:</label>
                    <div class="col-md-5 ">
                        <select name="servicios_id" id="servicios_id" class="form-control">
                            <option value="0">--SELECCIONA UN SERVICIO--</option>
                           @foreach($servicios as $row)
                                <option value="{{$row['id']}}">{{$row['plan']}} TIPO:{{$row['tipoacceso']}},VELOCIDAD:{{$row['velocidad']}}</option>
                               @endforeach
                        </select>

                    </div>
                </div>
                <hr>

                 <div class="form-group row" id="div_socios">
                    <label for="" content="" class="col-md-2">NUM TELEFONO:</label>
                    <div class="col-md-2">

                        <input type="text" id="telf_input" class="form-control" placeholder="NUM TELEFONO">
                        <input type="hidden" name="telefonos_id" id="telefonos_id">
                    </div>
                    <div class="col-md-2">

                        <input type="text" id="tipo_linea" class="form-control" readonly placeholder="TIPO LINEA">

                    </div>
                    <div class="col-md-4">
                        <input type="text" id="nombre_socio"  name="nombre_socio"   class="form-control" readonly placeholder="NOMBRES SOCIO">

                    </div>
                    <div class="col-md-2">
                        <input type="text" id="carnet_socio" name="carnet_socio" class="form-control" readonly PLACEHOLDER="CARNET">

                    </div>

                </div>

            <div class="form-group row">
                <label for="" class="col-md-2">TITULAR:</label>
                <div class="col-md-4">
                    <label for="">SOCIO<input type="radio" class=" radio-inline form-control"  name="titular" id="socio_rb"   checked/></label>
                    <label for="">PARTICULAR<input type="radio" class=" radio-inline form-control"  name="titular" id="particular_rb" /></label>

                </div>
            </div>
            <section id="div_particular" >
                <div class="form-group row  " >
                    <label for="" class="col-md-6"> DATOS PERSONALES:</label>
                    <div class="col-md-3">
                        <label for="" class="control-label">NOMBRES</label>
                        <input type="text" class="form-control" placeholder="nombres" name="nombres_particular" id="nombres">
                    </div>

                    <div class="col-md-2">
                        <label for="" class="control-label">CARNET</label>
                        <input type="text" class="form-control" placeholder="carnet" name="ci_particular" id="ci">
                    </div>
                </div>



            </section>

        </div>
        <div class="panel-footer">
            <input type="hidden" name="_token" value="{{csrf_token()}}" id="_token" />
            <input type="hidden" name="sw_titular" value="socio" id="sw_titular" />
            <a href="{{url('contratos/')}}" class="btn btn-danger" ><i class="fa fa-times"></i> Cerrar</a>
            <button type="button" class="btn btn-success" onclick="guardar();" id="btn_guardar"> <i class=" fa fa-floppy-o"></i> Guardar</button>
        </div>
    </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script>
          $(document).ready(function(){

              $('#div_particular').hide();
              $('#socio_rb').click(function(){
                  $('#div_particular').hide()
                  //$('#div_socios').show();
                  $('#sw_titular').val('socio');
              });
              $('#particular_rb').click(function(){
                  $('#div_particular').show();
                 // $('#div_socios').hide();
                  $('#sw_titular').val('particular');
              });

              $('#numcontrato').change(function(){
                  var route='/contratos/validarNumContrato/'+$(this).val();
                  $.get(route,function(response){
                     if(response.status==200){
                         swal('Alerta','Este Numero de contrato ya se encuentra registrado','warning');
                         $("#btn_guardar").attr('disabled',true)
                     }
                      else {
                         $("#btn_guardar").attr('disabled',false)
                     }
                  });
              });


          });
          $("#telf_input").autocomplete({

              source:function(request,response){
                  $.ajax({
                      dataType:"json",
                      contentType:false,
                      url:"{{url('telefonos/autocompletar/')}}",
                      data:{
                          term:this.term
                      },
                      success:function(data){
                          response($.map(data,function(item){
                              return{
                                  id:item.id,
                                  numero:item.numero,
                                  tipo:item.tipolinea,
                                  nombres:item.socio.nombres+' '+item.socio.apellidopaterno+' '+item.socio.apellidomaterno,
                                  ci:item.socio.ci

                              }
                          }));
                      },
                  });
              },
              minLength: 1,

              open: function () {
                  $(this).addClass(".autocomplete-suggestions");
              },

              select:function productoSeleccionado(event, ui)
              {

                  var route='/contratos/validarNumTelefono/'+ui.item.id;
                  $.get(route,function(response){
                      if(response.status==200){
                          swal('Alerta','Este Numero de telefono ya se encuentra registrado en el contrato:','warning');
                          $( "#telf_input" ).val( '' );
                          $( "#telefonos_id" ).val( '' );
                          $("#btn_guardar").attr('disabled',true)
                      }
                      else {
                          $( "#telf_input" ).val( ui.item.numero );
                          $( "#telefonos_id" ).val( ui.item.id );
                          $("#nombre_socio").val( ui.item.nombres );
                          $("#carnet_socio").val( ui.item.ci );
                          $("#tipo_linea").val( ui.item.tipo );
                          $("#btn_guardar").attr('disabled',false)
                      }
                  });



                  return false;
              }
          }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
              return $( "<li>" )
                      .data( "ui-autocomplete-item", item )
                      .append( "<a><strong>" + item.ci + ":" + item.nombres +"</a>" )
                      .appendTo( ul );
          };

        function guardar() {
            if( validarContrato()&&validarServicio()&&validarTelefono()&&validarTitular()) {
                swal({
                            title: "Esta seguro.?",
                            text: "Se guardara el contrato!",
                            type: "warning",
                            showCancelButton: true,
                            cancelButtonText: "Cancelar",
                            confirmButtonColor: "#5CB85C",
                            confirmButtonText: "Si, Registrar!",
                            closeOnConfirm: true
                        },
                        function () {


                            $("#newContratoForm").submit();


                        });
            }
        }

        function validarServicio(){
            if($('#servicios_id').val()=='0'){
                swal('Alerta','No selecciono ningun tipo de servicio','warning');
                return false;
            }
            else
                    return true;
        }
          function validarTelefono(){
              if($('#telefonos_id').val()==''){
                  swal('Alerta','No asigno un numero de telefono para el contrato','warning');
                  return false;
              }
              else
                  return true;
          }
          function validarTitular(){
              if($('#sw_titular').val()=='particular' &&$('#nombres').val()==''&&$('#ci').val=='' ){
                  swal('Alerta','Debe  revisar los  datos personales de la persona  ah asignar el contrato','warning');
                  return false;
              }
              else
                  return true;
          }
        function validarContrato() {
            if($('#numcontrato').val()==''){
                swal('Alerta','Debe asignar un numero de  contrato','warning');
                $('#numcontrato').focused();
                return false;

            }
            else
                return true;
        }

    </script>
    @endsection