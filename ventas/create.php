<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato, $proveedores_datos, $pdo, $clientes_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/clientes/listado_de_clientes.php');
include ('../app/controllers/ventas/ultimo_id.php');

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
                            <h1 class="m-0">Ventas</h1>
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
                                    <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta Nro.
                                        <input type="text" value="<?=$ultimo_id_dato + 1;?>" style="text-align: right; margin-left: 20px" disabled>
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">
                                    <b>Carrito</b>

                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-buscar_producto" style="border-radius: 5px">
                                        <i class="fa fa-search"></i>
                                        Buscar producto
                                    </button>
                                    <!-- modal para visualizar producto -->
                                    <div class="modal fade" id="modal-buscar_producto">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header bg-gradient-info">
                                                    <h4 class="modal-title">Busqueda del producto</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="table table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                                            <thead class="bg-warning">
                                                            <tr>
                                                                <th><center>Nro</center></th>
                                                                <th><center>Seleccionar</center></th>
                                                                <th><center>Código</center></th>
                                                                <th><center>Categoría</center></th>
                                                                <th><center>Imagen</center></th>
                                                                <th><center>Nombre</center></th>
                                                                <th><center>Descripcion</center></th>
                                                                <th><center>Stock</center></th>
                                                                <th><center>Precio compra</center></th>
                                                                <th><center>Precio venta</center></th>
                                                                <th><center>Fecha compra</center></th>
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
                                                                    <td>
                                                                        <center>
                                                                            <button class="btn btn-outline-info btn-sm" id="btn_seleccionar<?=$id_producto;?>">
                                                                                Seleccionar
                                                                            </button>
                                                                            <script>
                                                                                $('#btn_seleccionar<?=$id_producto;?>').click(function () {

                                                                                    var id_producto = "<?=$productos_dato['id_producto'];?>";
                                                                                    $('#id_producto').val(id_producto);

                                                                                    var producto = "<?=$productos_dato['nombre'];?>";
                                                                                    $('#producto').val(producto);

                                                                                    var descripcion = "<?=$productos_dato['descripcion'];?>";
                                                                                    $('#descripcion').val(descripcion);

                                                                                    var precio_venta = "<?='$' . number_format($productos_dato['precio_venta'], 2, '.', ',');?>";
                                                                                    $('#precio_venta').val(precio_venta);

                                                                                    $('#cantidad').focus();

                                                                                    // $('#modal-buscar_producto').modal('toggle');

                                                                                });
                                                                            </script>
                                                                        </center>
                                                                    </td>
                                                                    <td><center><?=$productos_dato['codigo'];?></center></td>
                                                                    <td><?=$productos_dato['categoria'];?></td>
                                                                    <td>
                                                                        <center>
                                                                            <img src="<?=$URL.'/almacen/img_productos/'.$productos_dato['imagen'];?>" alt="image"  style="width: 30px; height: 30px; object-fit: contain" >
                                                                        </center>
                                                                    </td>
                                                                    <td><?=$productos_dato['nombre'];?></td>
                                                                    <td><?=$productos_dato['descripcion'];?></td>
                                                                    <td style="text-align: right"><?=$productos_dato['stock'];?></td>
                                                                    <td style="text-align: right"><?='$ ' . number_format($productos_dato['precio_compra'], 2, '.', ',');?></td>
                                                                    <td style="text-align: right"><?='$ ' . number_format($productos_dato['precio_venta'], 2, '.', ',');?></td>
                                                                    <td><center><?=$productos_dato['fecha_ingreso'];?></center></td>
                                                                </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                            <tfoot class="bg-warning disabled">
                                                            <tr>
                                                                <th><center>Nro</center></th>
                                                                <th><center>Seleccionar</center></th>
                                                                <th><center>Código</center></th>
                                                                <th><center>Categoría</center></th>
                                                                <th><center>Imagen</center></th>
                                                                <th><center>Nombre</center></th>
                                                                <th><center>Descripcion</center></th>
                                                                <th><center>Stock</center></th>
                                                                <th><center>Precio compra</center></th>
                                                                <th><center>Precio venta</center></th>
                                                                <th><center>Fecha compra</center></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <input type="text" id="id_producto" hidden>
                                                                    <label for="">Producto</label>
                                                                    <input type="text" id="producto" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label for="">Descripción</label>
                                                                    <input type="text" id="descripcion" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Cantidad</label>
                                                                    <input type="text" id="cantidad" class="form-control text-right">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="">Precio unitario</label>
                                                                    <input type="text" id="precio_venta" class="form-control text-right" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary btn-sm" id="btn_registrar_carrito" style="float: right"><i class="bi bi-save"></i> Registrar</button>
                                                        <div id="respuesta_carrito"></div>
                                                        <script>
                                                            $('#btn_registrar_carrito').click(function () {
                                                                var nro_venta   = '<?=$ultimo_id_dato + 1;?>';
                                                                var id_producto = $('#id_producto').val();
                                                                var cantidad    = $('#cantidad').val();

                                                                if(id_producto == "") {
                                                                    alert("debe seleccionar un producto");
                                                                } else if(cantidad == "") {
                                                                    alert("debe ingrear una cantidad del producto");
                                                                } else {

                                                                    var url = "../app/controllers/ventas/registrar_carrito.php";

                                                                    $.get(url,{
                                                                        nro_venta:nro_venta,
                                                                        id_producto:id_producto,
                                                                        cantidad:cantidad
                                                                    },function (datos) {
                                                                        $('#respuesta_carrito').html(datos);
                                                                    });

                                                                }
                                                            });
                                                        </script>
                                                        <br><br>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <br><br>
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
                                                    <th style="background-color: #e7e7e7; text-align: center">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $contador_carrito       = 0;
                                                    $cantidad_total         = 0;
                                                    $precio_unitario_total  = 0;
                                                    $importe_total          = 0;
                                                    $nro_venta              = $ultimo_id_dato + 1;
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
                                                            <td>
                                                                <center>
                                                                    <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                                        <input type="text" name="id_carrito" value="<?=$id_carrito;?>" hidden>
                                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                                    </form>
                                                                </center>
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
                            <div class="card card-outline card-primary">
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
                                    <b>Cliente</b>

                                    <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-buscar_cliente" style="border-radius: 5px">
                                        <i class="fa fa-search"></i>
                                        Buscar cliente
                                    </button>
                                    <!-- modal para visualizar clientes -->
                                    <div class="modal fade" id="modal-buscar_cliente">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header bg-gradient-primary">
                                                    <h4 class="modal-title">Busqueda del cliente</h4>
                                                    <button type="button" class="btn btn-outline-warning btn-sm ml-5" data-toggle="modal" data-target="#modal-agregar_cliente" style="border-radius: 5px">
                                                        <i class="fa fa-users"></i>
                                                        Agregar cliente
                                                    </button>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="table table-responsive">
                                                        <table id="example2" class="table table-bordered table-striped table-sm table-hover">
                                                            <thead class="bg-warning">
                                                            <tr>
                                                                <th><center>Nro</center></th>
                                                                <th><center>Seleccionar</center></th>
                                                                <th><center>Nombre cliente</center></th>
                                                                <th><center>DNI cliente</center></th>
                                                                <th><center>Celular</center></th>
                                                                <th><center>Email</center></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            $contador_clientes = 0;
                                                            foreach ($clientes_datos as $clientes_dato) {
                                                                $contador_clientes = $contador_clientes + 1;
                                                                $id_cliente = $clientes_dato['id_cliente'];
                                                                $nombre_cliente = $clientes_dato['nombre_cliente'];
                                                                $dni_cliente = $clientes_dato['dni_cliente'];
                                                                $celular_cliente = $clientes_dato['celular_cliente'];
                                                                $email_cliente = $clientes_dato['email_cliente'];
                                                                ?>
                                                                    <tr>
                                                                        <td><center><?=$contador_clientes;?></center></td>
                                                                        <td>
                                                                            <center>
                                                                                <button id="btn_pasar_cliente<?=$id_cliente?>" class="btn btn-outline-info btn-sm">
                                                                                    Seleccionar
                                                                                </button>
                                                                                <script>
                                                                                    $('#btn_pasar_cliente<?=$id_cliente?>').click(function () {

                                                                                        var id_cliente = '<?=$id_cliente?>';
                                                                                        $('#id_cliente').val(id_cliente);

                                                                                        var nombre_cliente = '<?=$nombre_cliente?>';
                                                                                        $('#nombre_cliente').val(nombre_cliente);

                                                                                        var dni_cliente = '<?=$dni_cliente?>';
                                                                                        $('#dni_cliente').val(dni_cliente);

                                                                                        var celular_cliente = '<?=$celular_cliente?>';
                                                                                        $('#celular_cliente').val(celular_cliente);

                                                                                        var email_cliente = '<?=$email_cliente?>';
                                                                                        $('#email_cliente').val(email_cliente);

                                                                                        $('#modal-buscar_cliente').modal('toggle');

                                                                                    });
                                                                                </script>
                                                                            </center>
                                                                        </td>
                                                                        <td><?=$nombre_cliente;?></td>
                                                                        <td><center><?=$dni_cliente;?></center></td>
                                                                        <td><?=$celular_cliente;?></td>
                                                                        <td><?=$email_cliente;?></td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                            ?>
                                                            </tbody>
                                                            <tfoot class="bg-warning disabled">
                                                            <tr>
                                                                <th><center>Nro</center></th>
                                                                <th><center>Seleccionar</center></th>
                                                                <th><center>Nombre cliente</center></th>
                                                                <th><center>DNI cliente</center></th>
                                                                <th><center>Celular</center></th>
                                                                <th><center>Email</center></th>
                                                            </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" id="id_cliente" hidden>
                                                <label for="">Nombre del cliente</label>
                                                <input type="text" class="form-control" id="nombre_cliente">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">DNI del cliente</label>
                                                <input type="text" class="form-control" id="dni_cliente">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Celular del cliente</label>
                                                <input type="text" class="form-control" id="celular_cliente">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email del cliente</label>
                                                <input type="text" class="form-control" id="email_cliente">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar venta</h3>
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Total pagado</label>
                                                <input type="text" id="total_pagado" class="form-control" style="text-align: right;">
                                                <script>
                                                    $('#total_pagado').keyup(function () {
                                                        var total_a_cancelar_str = $('#total_a_cancelar').val();
                                                        var total_a_cancelar = parseFloat(total_a_cancelar_str.replace(/[^0-9.-]+/g,""));
                                                        var total_pagado = $('#total_pagado').val();
                                                        var cambio = parseFloat(total_pagado) - parseFloat(total_a_cancelar);
                                                        var cambio_str = cambio.toLocaleString('es-AR', { style: 'currency', currency: 'ARS' });
                                                        $('#cambio').val(cambio_str);
                                                    });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cambio</label>
                                                <input type="text" id="cambio" class="form-control" style="text-align: right;" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <button id="btn_guardar_venta" class="btn btn-primary"><i class="bi bi-save"></i> Guardar venta</button>
                                        <a href="index.php"  class="btn btn-secondary float-right"><i class="bi bi-reply-fill"></i> Volver</a>
                                        <div id="respuesta_registro_venta"></div>
                                        <script>
                                            $('#btn_guardar_venta').click(function () {
                                                var nro_venta = '<?=$ultimo_id_dato + 1;?>';
                                                var id_cliente = $('#id_cliente').val();
                                                var total_a_cancelar_str = $('#total_a_cancelar').val();
                                                var total_a_cancelar = parseFloat(total_a_cancelar_str.replace(/[^0-9.-]+/g,""));

                                                if(id_cliente == "") {
                                                    alert("Debe seleccionar un cliente");
                                                } else {
                                                    actualizar_stock();
                                                    guardar_venta();
                                                }

                                                function actualizar_stock() {

                                                    var i = 1;
                                                    var n = '<?=$contador_carrito;?>';

                                                    for (i = 1; i <= n; i++) {
                                                        var a = '#stock_inventario' + i;
                                                        var stock_inventario = $(a).val();

                                                        var b = '#cantidad_carrito' + i;
                                                        var cantidad_carrito = $(b).html();

                                                        var c = '#id_producto' + i;
                                                        var id_producto = $(c).val();

                                                        var stock_calculado = parseFloat(stock_inventario - cantidad_carrito);

                                                        // alert(id_producto + ' - ' + stock_inventario + ' - ' + cantidad_carrito + ' - ' + stock_calculado);

                                                        var url2 = "../app/controllers/ventas/actualizar_stock.php";

                                                        $.get(url2,{
                                                            id_producto:id_producto,
                                                            stock_calculado:stock_calculado
                                                        },function (datos) {

                                                        });

                                                    }
                                                }

                                                function guardar_venta() {
                                                    var url = "../app/controllers/ventas/registro_de_ventas.php";

                                                    $.get(url,{
                                                        nro_venta:nro_venta,
                                                        id_cliente:id_cliente,
                                                        total_a_cancelar:total_a_cancelar
                                                    },function (datos) {
                                                        $('#respuesta_registro_venta').html(datos);
                                                    });
                                                }
                                            });
                                        </script>
                                    </div>
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