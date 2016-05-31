@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
        <div class="panel panel-default">
            <header class="panel-heading">
                <i class="fa fa-tags"></i> Servicios

                <a href="#newServicioModal" data-toggle="modal" class="btn btn-success"><i class="fa fa-plus"></i> REGISTRAR SERVICIO</a>
                @include('servicios.edit')
                @include('servicios.nuevo')

            </header>
            <div class="panel-body col-md-12">
                <table class=" table table-bordered table-striped table-condensed table-responsive" id="servicios-table" >
                    <thead>
                    <tr>
                        <th>PLAN</th>
                        <th>TIPO<BR>ACCESO</th>
                        <th>VELOCIDAD</th>
                        <th>COSTO DE <BR>INSTALACION</th>
                        <th>HORAS LIBRES <BR>DISPONIBLES</th>
                        <th>TIPO <BR>PAGO</th>
                        <th>TARIFA <BR>PAGO</th>
                        <th>OBSERVACION</th>
                        <th>ACCIONES</th>

                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>

        </div>
        </div>
    </div>
    @endsection
@section('script')
    <script>
       $(document).ready(function(){


           var dt=$('#servicios-table').dataTable({
               'ajax': {
                   'url': 'servicios/listar'
               },
               "bProcessing": true,
               "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                   if ( aData['estado'] == "0" )
                   {
                       $('td:eq(8)', nRow).html( '<a href="###" id="'+aData["id"]+'" class="btn btn-success btn-xs" onclick="habilitar(this.id)"> <i class="fa fa-check"></i>Habilitar</a>' );
                   }
               },
               "columns": [
                   { "data": "plan" },
                   { "data": "tipoacceso" },
                   { "data": "velocidad" },
                   { "data": "costoinstalacion"},
                   { "data": "horaslibres" },
                   { "data": "tipopago" },
                   { "data": "montopago" },
                   { "data": "observacion"},
                   { "data": "id",
                       "orderable": false,
                       "searchable": false,
                       "render": function(data,type,row,meta) {
                           var a='<div class="btn-group">' +
                                   '<button class="btn btn-primary btn-xs" type="button"><i class="fa fa-gears"></i> Acciones</button>' +
                                   '<button data-toggle="dropdown" class="btn btn-success dropdown-toggle btn-xs" type="button">' +
                                   '<span class="caret"></span>' +
                                   '<span class="sr-only">Toggle Dropdown</span>' +
                                   '</button>' +
                                   '<ul role="menu" class="dropdown-menu">' +
                                   '<li><a href="#editServicioModal" data-toggle="modal" id="'+data+'" onclick="editar(this.id);" ><i class="fa fa-edit"></i>Actualizar</a></li>' +
                                   '<li><a href="#"  ><i class="fa fa-times"></i> Eliminar</a></li>' +
                                   '<li><a href="#"><i class="fa fa-lock"></i> Deshabilitar</a></li>' +

                                   '</ul></div>';

                           return a;
                       }
                   },

               ],
               "bPaginate": true,
               "oLanguage": {
                   "sLengthMenu": "<B>Mostrando _MENU_ registros  por pagina</B>",
                   "sZeroRecords": "Ningun Registro Encontrado",
                   "sInfo": "Mostrar _START_ a _END_ de _TOTAL_ Registros",
                   "sInfoEmpty": "<B>Mostrando 0 a 0 de 0 Registros</B>",
                   "sInfoFiltered": "(Filtrados _MAX_  de un total de Registros)",
                   "sSearch": "<B>BUSCAR:</B>"
               },
               "bLengthChange": true,
               "bFilter": true,
               "bSort": true,
               "aaSorting": [ [1,'desc'] ],
               "bInfo": true,
               "bAutoWidth": false,
               "iDisplayLength": -1,
               "aLengthMenu": [[25,50,100,300,500,1000,-1], [25, 50, 100,300,500,1000, "Todos"]],
               "sPaginationType": "full_numbers"
           });

       });

        function guardar(){
            var route='servicios/store';
            $.post(route,$("#createServicioForm").serialize(),function(response){
                if(response.status==200)
                        swal('Registro exitoso');
                $("#createServicioForm")[0].reset();
                $("#newServicioModal").modal('toggle');

                $('#servicios-table').DataTable().ajax.reload(null, false);

            });

        }

        function  editar(id){
             var route='servicios/edit/'+id;
            $.get(route,function(response){
                if(response.status==200){
                    $('#plan_edit').val(response.data.plan);
                    $('#tipoacceso_edit').val(response.data.tipoacceso);
                    $('#velocidad_edit').val(response.data.velocidad);
                    $('#costoinstalacion_edit').val(response.data.costoinstalacion);
                    $('#horaslibres_edit').val(response.data.horaslibres);
                    if(response.data.tipopago=='PREPAGO')
                     $('#tipo1_edit').attr('checked',1);
                    if(response.data.tipopago=='POSTPAGO')
                        $('#tipo2_edit').attr('checked',1);
                    $('#montopago_edit').val(response.data.montopago);
                    $('#observacion_edit').val(response.data.observacion);
                    $('#id').val(response.data.id);
                }
            });
        }

        function update(){
            var route='servicios/update';
            $.post(route,$("#editServicioForm").serialize(),function(response){
                if(response.status==200){
                    $("#editServicioModal").modal('toggle');

                    $('#servicios-table').DataTable().ajax.reload(null, false);
                }
                else
                        swal('Error','Ah ocurrido un error al procesar los datos','error')

            });
        }





    </script>
    @endsection