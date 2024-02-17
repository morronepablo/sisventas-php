<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato, $proveedores_datos, $codigo, $categoria, $nombre_producto, $descripcion, $fyh_creacion_p, $stock, $stock_minimo, $stock_maximo, $precio_compra, $precio_venta, $fecha_ingreso, $imagen, $nombre_proveedor, $celular, $telefono, $empresa, $email, $direccion, $nro_compra, $fecha_compra, $comprobante, $cantidad_compra, $nombres, $precio_compra_total, $nombre_proveedor_tabla, $celular_tabla, $telefono_tabla, $empresa_tabla, $email_tabla, $direccion_tabla, $id_compra, $id_producto;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/proveedores/listado_de_proveedores.php');
include ('../app/controllers/compras/cargar_compra.php');

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
                            <h1 class="m-0">Detalle de Compra</h1>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <h3 class="card-title">¿Está seguro de eliminar la compra?</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body" style="display: block">
                                            <div style="display: flex; align-items: center">
                                                <h5 class="m-0 mr-2">Datos del producto</h5>
                                            </div>
                                            <hr>
                                            <div class="row" style="font-size: 12px">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" value="<?=$id_producto?>" id="id_producto" hidden>
                                                                <label for="">Codigo:</label>
                                                                <h5 class="text-success" id="codigo"><?=$codigo;?></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Categoría:</label>
                                                                <div style="display: flex">
                                                                    <p id="categoria"><?=$categoria;?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Nombre de producto:</label>
                                                            <div class="form-group">
                                                                <p id="nombre_producto"><?=$nombre_producto;?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="">Descripción:</label>
                                                                <p id="descripcion_producto"><?=$descripcion;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Fecha y Hora creación</label>
                                                                <p>
                                                                    <?php
                                                                    $date = date_create($fyh_creacion_p);
                                                                    echo date_format($date, 'd/m/Y H:i:s');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock:</label>
                                                                <p id="stock" style="background-color: #fff819; text-align: right; padding-right: 10px; border-radius: 5px;"><?=$stock;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo:</label>
                                                                <p id="stock_minimo" style="text-align: right; padding-right: 10px;"><?=$stock_minimo;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo:</label>
                                                                <p id="stock_maximo" style="text-align: right; padding-right: 10px;"><?=$stock_maximo;?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio compra:</label>
                                                                <p id="precio_compra" style="text-align: right; padding-right: 10px;"><?='$' . number_format($precio_compra, 2, '.', ',');?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio venta:</label>
                                                                <p id="precio_venta" style="text-align: right; padding-right: 10px;"><?='$' . number_format($precio_venta, 2, '.', ',');?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Fecha ingreso:</label>
                                                                <p>
                                                                    <?php
                                                                    $date = date_create($fecha_ingreso);
                                                                    echo date_format($date, 'd/m/Y');
                                                                    ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <br>
                                                        <center>
                                                            <img src="<?=$URL.'/almacen/img_productos/'.$imagen;?>" class="img-fluid" style="height: 170px">
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="display: flex; align-items: center">
                                                <h5 class="m-0 mr-2">Datos del proveedor</h5>
                                            </div>
                                            <hr>
                                            <div class="container-fluid" style="font-size: 12px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" id="id_proveedor" hidden>
                                                            <label for="">Nombre del proveedor</label>
                                                            <input type="text" id="nombre_proveedor" value="<?=$nombre_proveedor_tabla;?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Celular</label>
                                                            <input type="number" id="celular" value="<?=$celular_tabla;?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Teléfono</label>
                                                            <input type="number" id="telefono" value="<?=$telefono_tabla;?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Empresa</label>
                                                            <input type="text" id="empresa" value="<?=$empresa_tabla;?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" id="email" value="<?=$email_tabla;?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Dirección</label>
                                                            <textarea id="direccion" cols="30" rows="1" class="form-control" disabled><?=$direccion_tabla;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-outline card-danger" style="font-size: 15px">
                                        <div class="card-header">
                                            <h3 class="card-title">Detalle de la compra</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>

                                        </div>

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Nro. compra</label>
                                                        <p class="text-right"><?=$nro_compra;?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Fecha compra</label>
                                                        <p>
                                                            <?php
                                                            $date = date_create($fecha_compra);
                                                            echo date_format($date, 'd/m/Y');
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Comprobante</label>
                                                        <p><?=$comprobante;?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <p id="precio_compra" style="text-align: right; padding-right: 10px;"><?='$' . number_format($precio_compra_total, 2, '.', ',');?></p>
                                                    </div>
                                                </div>


                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Cantidad compra</label>
                                                        <p><?=$cantidad_compra;?></p>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" class="form-control" value="<?=$nombres;?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button id="btn_eliminar" class="btn btn-danger"><i class="fa fa-trash"></i> Eliminar compra</button>
                                                    <a href="index.php"  class="btn btn-secondary float-right"><i class="bi bi-reply-fill"></i> Volver</a>
                                                </div>
                                            </div>
                                            <script>
                                                $('#btn_eliminar').click(function () {
                                                    var id_compra = '<?=$id_compra?>';
                                                    var id_producto = $('#id_producto').val();
                                                    var cantidad_compra = '<?=$cantidad_compra;?>';
                                                    var stock_actual = '<?=$stock;?>';

                                                    Swal.fire({
                                                        title: '¿Está seguro de eliminar la compra?',
                                                        icon: 'question',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Si, deseo eliminar !'
                                                    }).then((result) => {
                                                        if(result.isConfirmed) {
                                                            Swal.fire(
                                                                eliminar(),
                                                                'Compra eliminada !',
                                                                'success'
                                                            );
                                                        }
                                                    });
                                                    function eliminar() {
                                                        var url = "../app/controllers/compras/delete.php";

                                                        $.get(url,{
                                                            id_compra:id_compra,
                                                            id_producto:id_producto,
                                                            cantidad_compra:cantidad_compra,
                                                            stock_actual:stock_actual
                                                        },function (datos) {
                                                            $('#respuesta_delete').html(datos);
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>

                                    </div>

                                </div>

                                <div id="respuesta_delete"></div>

                            </div>


                        </div>
                    </div>

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
