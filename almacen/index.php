<?php

global $productos_datos, $URL;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/almacen/listado_de_productos.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de productos</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12 d-flex justify-content-between align-items-center">
                                    <h3 class="card-title m-0">Productos registrados</h3>
                                    <div class="card-tools">
                                        <a href="create.php" class="btn btn-outline-primary"><i class="bi bi-plus-square"></i> Crear nuevo producto</a>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                    <thead class="bg-warning">
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Código</center></th>
                                        <th><center>Categoría</center></th>
                                        <th><center>Imagen</center></th>
                                        <th><center>Nombre</center></th>
                                        <th><center>Stock</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Precio venta</center></th>
                                        <th><center>Fecha compra</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador_productos = 0;
                                    foreach ($productos_datos as $productos_dato) {
                                        $contador_productos = $contador_productos + 1;
                                        $id_producto = $productos_dato['id_producto'];
                                        ?>
                                        <tr>
                                            <td><center><?=$contador_productos;?></center></td>
                                            <td><center><?=$productos_dato['codigo'];?></center></td>
                                            <td><?=$productos_dato['categoria'];?></td>
                                            <td>
                                                <center>
                                                    <img src="<?=$URL.'/almacen/img_productos/'.$productos_dato['imagen'];?>" alt="image"  style="width: 30px; height: 30px; object-fit: contain" >
                                                </center>
                                            </td>
                                            <td><?=$productos_dato['nombre'];?></td>
                                            <?php
                                                $stock_actual = $productos_dato['stock'];
                                                $stock_maximo = $productos_dato['stock_maximo'];
                                                $stock_minimo = $productos_dato['stock_minimo'];
                                                if($stock_actual < $stock_minimo) { ?>
                                                    <td style="text-align: right; background-color: #ff7373; color: white; font-weight: bold"><?=$productos_dato['stock'];?></td>
                                                <?php
                                                }
                                                else if($stock_actual > $stock_maximo) { ?>
                                                    <td style="text-align: right; background-color: #00d285; color: white; font-weight: bold"><?=$productos_dato['stock'];?></td>
                                                <?php
                                                } else { ?>
                                                    <td style="text-align: right"><?=$productos_dato['stock'];?></td>
                                                <?php
                                                }
                                            ?>

                                            <td style="text-align: right"><?='$' . number_format($productos_dato['precio_compra'], 2, '.', ',');?></td>
                                            <td style="text-align: right"><?='$' . number_format($productos_dato['precio_venta'], 2, '.', ',');?></td>
                                            <td><center><?=$productos_dato['fecha_ingreso'];?></center></td>
                                            <td class="actions">
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?=$id_producto;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                        <a href="update.php?id=<?=$id_producto;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="delete.php?id=<?=$id_producto;?>" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                                        <th><center>Código</center></th>
                                        <th><center>Categoría</center></th>
                                        <th><center>Imagen</center></th>
                                        <th><center>Nombre</center></th>
                                        <th><center>Stock</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Precio venta</center></th>
                                        <th><center>Fecha compra</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
