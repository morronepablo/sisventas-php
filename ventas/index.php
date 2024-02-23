<?php

global $productos_datos, $URL, $compras_datos, $ventas_datos, $pdo;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/ventas/listado_de_ventas.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de ventas</h1>
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
                            <h3 class="card-title">Ventas registradas</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-outline-primary"><i class="bi bi-plus-square"></i> Crear nueva venta</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                    <thead class="bg-success">
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro. venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total pagado</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador_ventas = 0;
                                    foreach ($ventas_datos as $ventas_dato) {
                                        $contador_ventas    = $contador_ventas + 1;
                                        $id_venta           = $ventas_dato['id_venta'];
                                        $nro_venta          = $ventas_dato['nro_venta'];
                                        $total_pagado       = $ventas_dato['total_pagado'];
                                        $nombre_cliente     = $ventas_dato['nombre_cliente'];
                                        $dni_cliente        = $ventas_dato['dni_cliente'];
                                        $celular_cliente    = $ventas_dato['celular_cliente'];
                                        $email_cliente      = $ventas_dato['email_cliente'];
                                        ?>
                                        <tr>
                                            <td><center><?=$contador_ventas;?></center></td>
                                            <td style="text-align: right"><?=$nro_venta;?></td>
                                            <td>
                                                <center>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal_productos<?=$id_venta?>">
                                                        <i class="fa fa-shopping-cart"></i> Productos
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal_productos<?=$id_venta?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-gradient-info">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Productos de la venta <?=$nro_venta;?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table table-bordered table-sm table-hover table-striped">
                                                                        <thead>
                                                                        <tr>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Detalle</th>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Precio unitario</th>
                                                                            <th style="background-color: #e7e7e7; text-align: center">Precio SubTotal</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $contador_carrito       = 0;
                                                                        $cantidad_total         = 0;
                                                                        $precio_unitario_total  = 0;
                                                                        $importe_total          = 0;
                                                                        $sql_carrito = "
                                                                        SELECT *,
                                                                               pro.id_producto AS id_producto,
                                                                               pro.nombre AS nombre_producto, 
                                                                               pro.descripcion AS descripcion_producto,
                                                                               pro.precio_venta AS precio_venta,
                                                                               pro.stock AS stock
                                                                        FROM tb_carrito AS carr 
                                                                        INNER JOIN tb_almacen AS pro ON carr.producto_id = pro.id_producto 
                                                                        WHERE nro_venta = '$nro_venta' 
                                                                        ORDER BY id_carrito ASC
                                                                        ";
                                                                        $query_carrito = $pdo->prepare($sql_carrito);
                                                                        $query_carrito->execute();
                                                                        $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                                        foreach ($carrito_datos as $carrito_dato) {
                                                                            $contador_carrito       = $contador_carrito + 1;
                                                                            $id_carrito             = $carrito_dato['id_carrito'];
                                                                            $id_producto            = $carrito_dato['id_producto'];
                                                                            $cantidad_total         = $cantidad_total + floatval($carrito_dato['cantidad']);
                                                                            $precio_unitario_total  = $precio_unitario_total + floatval($carrito_dato['precio_venta']);
                                                                            ?>
                                                                            <tr>
                                                                                <td>
                                                                                    <center><?=$contador_carrito;?></center>
                                                                                    <input type="text" id="id_producto<?=$contador_carrito;?>" value="<?=$id_producto;?>" hidden>
                                                                                </td>
                                                                                <td><?=$carrito_dato['nombre_producto'];?></td>
                                                                                <td><?=$carrito_dato['descripcion_producto'];?></td>
                                                                                <td style="text-align: right">
                                                                                    <span id="cantidad_carrito<?=$contador_carrito;?>"><?=$carrito_dato['cantidad'];?></span>
                                                                                    <input type="text" value="<?=$carrito_dato['stock'];?>" id="stock_inventario<?=$contador_carrito;?>" hidden>
                                                                                </td>
                                                                                <td style="text-align: right"><?='$ ' . number_format($carrito_dato['precio_venta'], 2, '.', ',');?></td>
                                                                                <td style="text-align: right">
                                                                                    <?php
                                                                                    $cantidad = floatval($carrito_dato['cantidad']);
                                                                                    $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                                    $subtotal = $cantidad * $precio_venta;
                                                                                    echo '$ ' . number_format($subtotal, 2, '.', ',');
                                                                                    $importe_total = $importe_total + $subtotal;
                                                                                    ?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <tr>
                                                                            <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total</th>
                                                                            <th style="text-align: right"><?=$cantidad_total;?></th>
                                                                            <th style="text-align: right"><?='$ ' . number_format($precio_unitario_total, 2, '.', ',');?></th>
                                                                            <th style="text-align: right; background-color: #FFF819"><?='$ ' . number_format($importe_total, 2, '.', ',');?></th>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>
                                            <td>
                                                <center>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#modal_clientes<?=$id_venta?>">
                                                        <i class="fa fa-shopping-cart"></i> <?=$nombre_cliente;?>
                                                    </button>

                                                    <!-- modal datos del cliente -->
                                                    <div class="modal fade" id="modal_clientes<?=$id_venta?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #B6900C; color: white;">
                                                                    <h4 class="modal-title">Cliente</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">
                                                                    <div class="table table-responsive">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del cliente</label>
                                                                            <input type="text" value="<?=$nombre_cliente;?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">DNI del cliente</label>
                                                                            <input type="text" value="<?=$dni_cliente;?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Celular del cliente</label>
                                                                            <input type="text" value="<?=$celular_cliente;?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="">Email del cliente</label>
                                                                            <input type="email" value="<?=$email_cliente;?>" class="form-control" disabled>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="form-group">
                                                                            <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="bi bi-reply-fill"></i> Salir</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                </center>
                                            </td>

                                            <td style="text-align: right"><?='$ ' . number_format($total_pagado, 2, '.', ',');?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?=$id_venta;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                        <a href="delete.php?id=<?=$id_venta;?>&nro_venta=<?=$nro_venta;?>" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                                                        <a href="factura.php?id=<?=$id_venta;?>&nro_venta=<?=$nro_venta;?>" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-print"></i></a>
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot class="bg-success disabled">
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro. venta</center></th>
                                        <th><center>Productos</center></th>
                                        <th><center>Cliente</center></th>
                                        <th><center>Total pagado</center></th>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Ventas",
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
