<?php


global $roles_datos, $categorias_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/categorias/listado_de_categorias.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de categorías</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-7">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorías registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create">
                                    <i class="bi bi-plus-square"></i> Crear nueva categoría
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                <thead class="bg-warning">
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre de la categoría</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_categorias = 0;
                                foreach ($categorias_datos as $categorias_dato) {
                                    $contador_categorias    = $contador_categorias + 1;
                                    $id_categoria           = $categorias_dato['id_categoria'];
                                    $nombre_categoria       = $categorias_dato['nombre_categoria'];
                                    ?>
                                    <tr>
                                        <td><center><?=$contador_categorias;?></center></td>
                                        <td><?=$categorias_dato['nombre_categoria'];?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-update<?=$id_categoria;?>" style="border-radius: 5px">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <!-- modal para actualizar categorías -->
                                                    <div class="modal fade" id="modal-update<?=$id_categoria;?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-gradient-success">
                                                                    <h4 class="modal-title">Actualización de categoría</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label for="" class="text-right">Nombre de la categoría <b>*</b></label>
                                                                                <input type="text" id="nombre_categoria<?=$id_categoria;?>" value="<?=$nombre_categoria;?>" class="form-control">
                                                                                <small style="color: red; display: none" id="lbl_update<?=$id_categoria;?>">* Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-outline-success" id="btn_update<?=$id_categoria;?>">Actualizar</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_update<?=$id_categoria;?>').click(function () {

                                                            var nombre_categoria = $('#nombre_categoria<?=$id_categoria;?>').val();
                                                            var id_categoria = '<?=$id_categoria;?>';

                                                            if(nombre_categoria == "") {
                                                                $('#nombre_categoria<?=$id_categoria;?>').focus();
                                                                $('#lbl_update<?=$id_categoria;?>').css('display','block');
                                                            } else {
                                                                var url = "../app/controllers/categorias/update_de_categorias.php";

                                                                $.get(url,{nombre_categoria:nombre_categoria,id_categoria:id_categoria},function (datos) {
                                                                    $('#respuesta_update<?=$id_categoria;?>').html(datos);
                                                                });
                                                            }

                                                        });
                                                    </script>
                                                    <div id="respuesta_update<?=$id_categoria;?>"></div>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot class="bg-warning disabled">
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre de la categoría</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include ('../layout/mensajes.php');

if(isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "<?=$icono;?>",
            title: "<?=$respuesta;?>",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    <?php
    unset($_SESSION['mensaje'], $_SESSION['icono']);
}

include ('../layout/parte2.php');
?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>


<!-- modal para registrar categorías -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h4 class="modal-title">Creación de categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoría <b>*</b></label>
                            <input type="text" id="nombre_categoria" class="form-control">
                            <small style="color: red; display: none" id="lbl_create">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between bg-gradient-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-primary" id="btn_create">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $('#btn_create').click(function () {
        var nombre_categoria = $('#nombre_categoria').val();

        if(nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display','block');
        } else {
            var url = "../app/controllers/categorias/registro_de_categorias.php";

            $.get(url,{nombre_categoria:nombre_categoria},function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>
<div id="respuesta"></div>


