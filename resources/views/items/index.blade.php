@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="panel-default" style="margin-top:-2em">
                <header class="panel-heading">
                    <span style="margin-right:1em">ITEMS</span>

                    <a href="#myModal" data-toggle="modal" class="btn btn-success"> Nuevo Item <i class="fa fa-plus"></i></a>

                    @include('items.edit')
                    @include('items.nuevo')
                </header>
                <div class="panel-body col-md-12">
                    <section id="unseen">

                        <table class="table table-bordered table-striped table-condensed" id="items-table">
                            <thead>
                            <tr>
                                <th class="numeric">ID</th>
                                <th >Codigo</th>
                                <th >Descripcion</th>
                                <th >Tipo</th>
                                <th >Unidad</th>
                                <th >Fecha Alta</th>
                                <th >Categoria</th>
                                <th class="numeric">Acciones</th>
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

                var tablaProductos=$('#items-table').dataTable( {
                    "ajax":{
                        "url":'items/listar'
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
                        { "data": "codigo" },
                        { "data": "descripcion" },
                        { "data": "tipo",
                        "render":function(data,type,row,meta){
                           if(data=="s")
                            return "simple";
                        }
                        },
                        { "data": "unidad" },
                        { "data": "fecha_alta" },
                        { "data": "categoria.descripcion"},
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
                                        '<li><a href="#editModal" data-toggle="modal" id="'+data+'" onclick="abrirModalEditar(this.id);" ><i class="fa fa-edit"></i>Actualizar</a></li>' +
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
                } );


            //listar();
        });

        function guardar(){

            var route="items/store";
            var codigo=$("#codigo").val();
            var descripcion=$('#descripcion').val();
            var tipo=$('#tipo').val();
            var unidad=$('#unidad').val();
            var idcategorias=$('#idcategorias').val();
            var token=$("#_token").val();

            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{codigo:codigo,descripcion:descripcion,tipo:tipo,unidad:unidad,idcategorias:idcategorias},
                success:function(response){

                    $("#myModal").modal('toggle');
                    $('#items-table').DataTable().ajax.reload(null, false);
                }


            });
        }

        function actualizar(){
            var id=$("#id").val();
            var route="items/update/"+id;
            var token=$("#token").val();
            var codigo=$("#codigo_edit").val();
            var descripcion=$("#descripcion_edit").val();
            var unidad=$("#unidad_edit").val();
            var tipo=$("#tipo_edit").val();
            var idcategorias=$("#id").val();
            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{codigo:codigo,descripcion:descripcion,tipo:tipo,unidad:unidad,idcategorias:idcategorias},
                success:function(response){
                   if(response.status=200){
                       $("#editModal").modal('toggle');
                       $('#items-table').DataTable().ajax.reload(null, false);

                   }
                   else
                   swal(response.msg);

                }


            });

        }
        function listar(){

            $("#categorias-table tbody").remove();

            var  route="items/listar";
            $.get(route,function(response){


                filas="";
                $(response).each(function(key,value){
                filas+="<tr><td>"+value.id+"</td><td>"+value.codigo+"</td><td>"+value.tipo+"</td><td>"+value.categoria['descripcion']+"</td><td>   <a href='#editModal' data-toggle='modal' class='btn  btn-warning btn-xs' id='"+value.id+"' onclick='abrirModalCategoria(this.id);'> <i class='fa fa-edit'></i>  EDITAR</a> <a class='btn  btn-danger btn-xs'><i class='fa fa-eraser'></i>  BORRAR</a></td></tr>";

                });

                $("#items-table").append(filas);


            });
        }

        function abrirModalEditar( id){

            var route="items/edit/"+id;
            $.get(route,function(response){

                $("#descripcion_edit").val(response.descripcion);
                $("#codigo_edit").val(response.codigo);
                $("#idcategorias_edit").val(response.categoria['id']);
                $("#unidad_edit").val(response.unidad);
                $("#tipo_edit").val(response.tipo);
                $("#id").val(response.id);


            });


        }

    </script>

@endsection
