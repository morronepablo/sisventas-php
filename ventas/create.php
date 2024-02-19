<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato, $proveedores_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/proveedores/listado_de_proveedores.php');
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
                                        <input type="text" value="<?=$ultimo_id_dato + 1    ;?>" style="text-align: right; margin-left: 20px" disabled>
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

                                                                                    var codigo = "<?=$productos_dato['codigo'];?>";
                                                                                    $('#codigo').html(codigo);

                                                                                    var categoria = "<?=$productos_dato['categoria'];?>";
                                                                                    $('#categoria').html(categoria);

                                                                                    var nombre = "<?=$productos_dato['nombre'];?>";
                                                                                    $('#nombre_producto').html(nombre);

                                                                                    var descripcion = "<?=$productos_dato['descripcion'];?>";
                                                                                    $('#descripcion_producto').html(descripcion);

                                                                                    var stock = "<?=$productos_dato['stock'];?>";
                                                                                    $('#stock').html(stock);
                                                                                    $('#stock_actual').val(stock);

                                                                                    var stock_minimo = "<?=$productos_dato['stock_minimo'];?>";
                                                                                    $('#stock_minimo').html(stock_minimo);

                                                                                    var stock_maximo = "<?=$productos_dato['stock_maximo'];?>";
                                                                                    $('#stock_maximo').html(stock_maximo);

                                                                                    var precio_compra = "<?=$productos_dato['precio_compra'];?>";
                                                                                    $('#precio_compra').html(precio_compra);

                                                                                    var precio_venta = "<?=$productos_dato['precio_venta'];?>";
                                                                                    $('#precio_venta').html(precio_venta);

                                                                                    var fecha_ingreso = "<?php
                                                                                        $date = date_create($productos_dato['fecha_ingreso']);
                                                                                        echo date_format($date, 'd/m/Y');
                                                                                        ?>";
                                                                                    $('#fecha_ingreso').html(fecha_ingreso);

                                                                                    var fyh_creacion = "<?php
                                                                                        $date = date_create($productos_dato['fyh_creacion']);
                                                                                        echo date_format($date, 'd/m/Y H:i:s');
                                                                                        ?>";
                                                                                    $('#fyh_creacion').html(fyh_creacion);

                                                                                    var ruta_img = "<?=$URL.'/almacen/img_productos/'.$productos_dato['imagen'];?>";
                                                                                    $('#img_producto').css('display','block');
                                                                                    $('#img_producto').attr({src: ruta_img})

                                                                                    $('#modal-buscar_producto').modal('toggle');



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
                                                                    <td style="text-align: right"><?='$' . number_format($productos_dato['precio_compra'], 2, '.', ',');?></td>
                                                                    <td style="text-align: right"><?='$' . number_format($productos_dato['precio_venta'], 2, '.', ',');?></td>
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
                                                <tr>
                                                    <td><center>1</center></td>
                                                    <td>Gaseosa</td>
                                                    <td>Coca Cola 2,5l</td>
                                                    <td style="text-align: right">2</td>
                                                    <td style="text-align: right">$1.200,00</td>
                                                    <td style="text-align: right">$2.400,00</td>
                                                    <td><center><a href="" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></center></td>
                                                </tr>
                                                <tr>
                                                    <td><center>1</center></td>
                                                    <td>Gaseosa</td>
                                                    <td>Coca Cola 2,5l</td>
                                                    <td style="text-align: right">2</td>
                                                    <td style="text-align: right">$1.200,00</td>
                                                    <td style="text-align: right">$2.400,00</td>
                                                    <td><center><a href="" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></center></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" style="background-color: #e7e7e7; text-align: right">Total</th>
                                                    <th style="text-align: right">4</th>
                                                    <th style="text-align: right">$2.400,00</th>
                                                    <th style="text-align: right">$4.800,00</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-user-alt"></i> Datos del cliente</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body">
                                    asdad
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 a 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
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