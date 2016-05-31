@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel-default" style="margin-top:-2em">
                <header class="panel-heading">
                    <span style="margin-right:1em">EQUIPOS</span>

                    <a href="#myModal" data-toggle="modal" class="btn btn-success"> Nuevo Equipo <i class="fa fa-plus"></i></a>
                    @include('equipos.nuevo')
                    @include('equipos.edit')

                </header>
                <div class="panel-body col-md-12">
                    <section id="unseen">

                        <table class="table table-bordered table-striped table-condensed" id="equipos-table">
                            <thead>
                            <tr>
                                <th class="numeric">ID</th>
                                <th >Item</th>
                                <th >Codigo</th>
                                <th >Descripcion</th>
                                <th >Marca</th>
                                <th>Modelo</th>
                                <th>Fecha alta</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                    </section>
                </div>
            </section>
        </div>

    </div>
@endsection

@section('script')

    <script type="text/javascript">

        $(document).ready(function(){

            var tablaProductos=$('#equipos-table').dataTable( {
                "ajax":{
                    "url":'equipos/listar'
                },
                "bProcessing": true,
                "fnRowCallback": function( nRow, aData, iDisplayIndex ) {
                    if ( aData['estado'] == "0" )
                    {
                        $('td:eq(7)', nRow).html( '<a href="###" id="'+aData["id"]+'" class="btn btn-success btn-xs" onclick="habilitar(this.id)"> <i class="fa fa-check"></i>Habilitar</a>' );
                    }
                },
                "columns": [
                    { "data": "id" },
                    { "data": "item.descripcion" },
                    { "data": "codigo" },
                    { "data": "descripcion" },
                    { "data": "marca" },
                    { "data": "modelo" },
                    { "data": "fecha_alta" },
                    { "data": "id",
                        "orderable": false,
                        "searchable": false,
                        "render": function(data,type,row,meta) {
                            var a='<div class="btn-group">' +
                                    '<button class="btn btn-primary btn-xs" type="button"><i class="fa fa-gears"></i> Acciones</button>' +
                                    '<button data-toggle="dropdown" class="btn btn-success  dropdown-toggle " type="button">' +
                                    '<span class="caret"></span>' +
                                    '<span class="sr-only">Toggle Dropdown</span>' +
                                    '</button>' +
                                    '<ul role="menu" class="dropdown-menu">' +
                                    '<li><a href="#editModal" data-toggle="modal" id="'+data+'" onclick="abrirModalEditar(this.id);" ><i class="fa fa-edit"></i>Actualizar</a></li>' +
                                    '<li><a href="#"  ><i class="fa fa-times"></i> Eliminar</a></li>' +
                                    '<li><a href="#"><i class="fa fa-lock"></i> Deshabilitar</a></li>' +

                                    '</ul></div>';

                            return a;
                        }
                    }

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
            } );

             $("#items_descrip").autocomplete({
                 source:function(request,response){
                     $.ajax({
                         dataType:"json",
                         contentType:false,
                         url:"{{url('items/autocompletar/')}}",
                         data:{
                             term:this.term
                         },
                 success:function(data){
                     response($.map(data,function(item){
                     return{
                         id:item.id,
                         descripcion:item.descripcion,
                         codigo:item.codigo
                     }
                     }));
                 },
                     });
                 },
                 minLength: 1,

                 open: function () {
                     $(this).addClass(".autocomplete-suggestions");
                 },

                 select: 	function productoSeleccionado(event, ui)
                 {
                     $( "#items_descrip" ).val( ui.item.descripcion );
                     $( "#items_id" ).val( ui.item.id );
                     $( "#codigoitem" ).val( ui.item.codigo );
                     enableForm();


                     return false;
                 }
             }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
                 return $( "<li>" )
                         .data( "ui-autocomplete-item", item )
                         .append( "<a><strong>" + item.codigo + "-" + item.descripcion + "</a>" )
                         .appendTo( ul );
             };
        });

function enableForm(){
   $("#descripcion").attr("disabled",false);
   $("#marca").attr("disabled",false);
   $("#modelo").attr("disabled",false);
   $("#observaciones").attr("disabled",false);
   $("#codigo").attr("disabled",false);
    $("#codigo").focus();


}

        function store(){

            var route="equipos/store";
            var descripcion=$("#descripcion").val();
            var items_id=$("#items_id").val();
            var codigo=$("#codigo").val();
            var marca=$("#marca").val();
            var modelo=$("#modelo").val();
            var observaciones=$("#observaciones").val();
            var token=$("#token").val();
            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{descripcion:descripcion,items_id:items_id,codigo:codigo,marca:marca,modelo:modelo,observaciones:observaciones},
                success:function(response){

                    $("#myModal").modal('toggle');
                    $('#equipos-table').DataTable().ajax.reload(null, false);
                    $("#nuevoEquipoForm")[0].reset();
                }


            });
        }

        function update(){
            var id=$("#idequipo").val();
            var items_id=$("#items_id_edit").val();
            var codigo=$("#codigo_edit").val();
            var descripcion=$("#descripcion_edit").val();
            var marca= $("#marca_edit").val();
            var modelo=$("#modelo_edit").val();
            var observaciones=$("#observaciones_edit").val();
            var route="equipos/update/"+id;
            var token=$("#token").val();
            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{id:id,items_id:items_id,codigo:codigo,descripcion:descripcion,marca:marca,modelo:modelo,observaciones:observaciones},
                success:function(response){

                    if(response.status=="200") {

                        $("#editModal").modal('toggle');
                        $('#equipos-table').DataTable().ajax.reload(null, false);
                    }
                    else
                    {
                        swal("existio un error al guardar los datos.Intente nuevamente");
                    }


                }


            });

        }


        function abrirModalEditar( id){

            var route="equipos/edit/"+id;
            $.get(route,function(response){

                if(response.status=='200') {

                    $("#items_descrip_edit").val(response.equipo.item.descripcion);
                    $("#items_id_edit").val(response.equipo.item.id);
                    $("#codigoitem_edit").val(response.equipo.item.codigo);
                    $("#codigo_edit").val(response.equipo.codigo);
                    $("#descripcion_edit").val(response.equipo.descripcion);
                    $("#marca_edit").val(response.equipo.marca);
                    $("#modelo_edit").val(response.equipo.modelo);
                    $("#observaciones_edit").val(response.equipo.observaciones);
                    $("#idequipo").val(response.equipo.id);

                }
                else{
                    swal("Existio un error al cargar los datos.Intentelo nuevamente");
                    $("#editModal").modal('toggle');

                }


            });


        }

    </script>

@endsection
