<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato, $proveedores_datos, $pdo, $clientes_datos, $nro_venta, $nombre_cliente, $dni_cliente, $celular_cliente, $email_cliente;

$id_venta = $_GET['id'];
$nro_venta = $_GET['nro_venta'];

include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/ventas/cargar_venta.php');
include ('../app/controllers/clientes/cargar_cliente.php');

?>

<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="row">
        <div class="col-md-12">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <h1 class="m-0">Detalle de la venta Nro. <?=$nro_venta;?> ¿Está seguro de eliminar?</h1>
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
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro.
                                        <input type="text" value="<?=$nro_venta;?>" style="text-align: right; margin-left: 20px" disabled>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">

                                    <div class="table-responsive">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-user-alt"></i> Datos del cliente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <!-- Datos del CLIENTE !!!! -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" id="id_cliente" hidden>
                                                <label for="">Nombre del cliente</label>
                                                <input type="text" class="form-control" value="<?=$nombre_cliente;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">DNI del cliente</label>
                                                <input type="text" class="form-control" value="<?=$dni_cliente;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Celular del cliente</label>
                                                <input type="text" class="form-control" value="<?=$celular_cliente;?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email del cliente</label>
                                                <input type="text" class="form-control" value="<?=$email_cliente;?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registro venta</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Monto a cancelar</label>
                                        <input type="text" id="total_a_cancelar" class="form-control" style="text-align: right; background-color: #FFF819" value="<?='$ ' . number_format($importe_total, 2, '.', ',');?>" disabled>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button id="btn_eliminar_venta" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar venta</button>
                                        <a href="index.php"  class="btn btn-secondary float-right"><i class="bi bi-reply-fill"></i> Volver</a>
                                        <div id="btn_borrar_venta"></div>
                                    </div>
                                    <script>
                                        $('#btn_eliminar_venta').click(function () {

                                            var id_venta = '<?=$id_venta;?>';
                                            var nro_venta = '<?=$nro_venta;?>';

                                            actualizar_stock();
                                            borrar_venta();

                                            function actualizar_stock() {

                                                var i = 1;
                                                var n = '<?=$contador_carrito;?>';

                                                for (i = 1; i <= n; i++) {
                                                    var a = '#stock_inventario' + i;
                                                    var stock_inventario = parseFloat($(a).val());

                                                    var b = '#cantidad_carrito' + i;
                                                    var cantidad_carrito = parseFloat($(b).html());

                                                    var c = '#id_producto' + i;
                                                    var id_producto = $(c).val();

                                                    var stock_calculado = parseFloat(stock_inventario + cantidad_carrito);

                                                    // alert(id_producto + ' - ' + stock_inventario + ' - ' + cantidad_carrito + ' - ' + stock_calculado);

                                                    var url2 = "../app/controllers/ventas/actualizar_stock.php";

                                                    $.get(url2,{
                                                        id_producto:id_producto,
                                                        stock_calculado:stock_calculado
                                                    },function (datos) {

                                                    });
                                                }
                                            }

                                            function borrar_venta() {
                                                var url = "../app/controllers/ventas/borrar_venta.php";

                                                $.get(url,{
                                                    id_venta:id_venta,
                                                    nro_venta:nro_venta
                                                },function (datos) {
                                                    $('#btn_borrar_venta').html(datos);
                                                });
                                            }
                                        })
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- /.content -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
    </div>
</div>


<!-- /.content-wrapper -->

<?php
include ('../layout/mensajes.php');
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });

    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para agregar clientes -->
<div class="modal fade" id="modal-agregar_cliente">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #B6900C; color: white;">
                <h4 class="modal-title">Nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <div class="table table-responsive">
                    <form action="../app/controllers/clientes/guardar_clientes.php" method="post">
                        <div class="form-group">
                            <label for="">Nombre del cliente</label>
                            <input type="text" name="nombre_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">DNI del cliente</label>
                            <input type="text" name="dni_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Celular del cliente</label>
                            <input type="text" name="celular_cliente" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email del cliente</label>
                            <input type="email" name="email_cliente" class="form-control">
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-block"><i class="bi bi-save"></i> Guardar cliente</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->