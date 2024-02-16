<?php


global $roles_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de roles</h1>
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
                            <h3 class="card-title">Roles registrados</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-outline-primary"><i class="bi bi-plus-square"></i> Crear nuevo rol</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                <thead class="bg-warning">
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del rol</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_roles = 0;
                                foreach ($roles_datos as $roles_dato) {
                                    $contador_roles = $contador_roles + 1;
                                    $id_rol = $roles_dato['id_rol'];
                                    ?>
                                    <tr>
                                        <td><center><?=$contador_roles;?></center></td>
                                        <td><?=$roles_dato['rol'];?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <a href="update.php?id=<?=$id_rol;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
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
                                    <th><center>Nombre del rol</center></th>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Roles",
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















