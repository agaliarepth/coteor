@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <section class="panel-default" style="margin-top:-2em">
                <header class="panel-heading">
                    <span style="margin-right:1em">CATEGORIAS</span>

                    <a href="#myModal" data-toggle="modal" class="btn btn-success"> Nueva Categoria <i class="fa fa-plus"></i></a>
                    @include('categorias.nuevo')
                    @include('categorias.edit')

                </header>
                <div class="panel-body col-md-8">
                    <section id="unseen">

                        <table class="table table-bordered table-striped table-condensed" id="categorias-table">
                            <thead>
                            <tr>
                                <th class="numeric">ID</th>

                                <th >Codigo</th>
                                <th >Descripcion</th>


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


            listar();
        });

        function guardar(){

            var route="categorias/store";
            var codigo=$("#codigo").val();
            var descripcion=$("#descripcion").val();
            var token=$("#token").val();
            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{codigo:codigo,descripcion:descripcion},
                success:function(response){

                        m="";
                    if(response.status==500) {
                        $(response.msg).each(function (key, value) {
                            m += value + " ";
                        });

                        swal("Revise el formulario", m);
                        $("#myModal").modal('toggle');
                    }
                    else{
                        swal(response.msg[0]);
                        $("#myModal").modal('toggle');
                        listar();
                    }
                }


            });
        }

        function actualizar(){
            var id=$("#id").val();
            var descripcion=$("#descripcion_edit").val();
            var codigo=$("#codigo_edit").val();
            var route="categorias/update/"+id;
            var token=$("#token").val();
            $.ajax({
                url:route,
                type:"POST",
                dataType:"json",
                headers:{"X-CSRF-TOKEN":token},
                data:{id:id,codigo:codigo,descripcion:descripcion},
                success:function(response){

                    $("#editModal").modal('toggle');
                    listar();

                }


            });

        }
        function listar(){

            $("#categorias-table tbody").remove();

            var  route="categorias/listar";
            $.get(route,function(response){


                filas="";
                $(response.categorias).each(function(key,value){

                    filas+="<tr><td>"+value.id+"</td><td>"+value.codigo+"</td><td>"+value.descripcion+"</td><td>   <a href='#editModal' data-toggle='modal' class='btn  btn-warning btn-xs' id='"+value.id+"' onclick='abrirModalCategoria(this.id);'> <i class='fa fa-edit'></i>  EDITAR</a> <a class='btn  btn-danger btn-xs'><i class='fa fa-eraser'></i>  BORRAR</a></td></tr>";

                });

                $("#categorias-table").append(filas);


            });
        }

        function abrirModalCategoria( id){

            var route="categorias/edit/"+id;
            $.get(route,function(response){

                $("#descripcion_edit").val(response.descripcion);
                $("#codigo_edit").val(response.codigo);

                $("#id").val(response.id);


            });


        }

    </script>

@endsection
