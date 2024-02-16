<?php

global $nombres, $email, $fyh_creacion, $rol, $productos_datos, $email_sesion, $URL, $codigo, $categoria, $nombre, $descripcion, $stock, $stock_minimo, $stock_maximo, $precio_compra, $precio_venta, $fecha_ingreso, $imagen;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/show_producto.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Informacion del producto</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>
                    </div>

                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5 class="text-purple"><b>Usuario: <?=$nombres;?> | <?=$email;?></b></h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Codigo:</label>
                                                <h5 class="text-success"><?=$codigo;?></h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Categoría:</label>
                                                <div style="display: flex">
                                                    <p><?=$categoria;?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Nombre de producto:</label>
                                            <div class="form-group">
                                                <p><?=$nombre;?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Descripción:</label>
                                                <p><?=$descripcion;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Fecha y Hora creación</label>
                                                <p>
                                                    <?php
                                                    $date = date_create($fyh_creacion);
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
                                                <p><?=$stock;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock mínimo:</label>
                                                <p><?=$stock_minimo;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock máximo:</label>
                                                <p><?=$stock_maximo;?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio compra:</label>
                                                <p><?='$' . number_format($precio_compra, 2, '.', ',');?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio venta:</label>
                                                <p><?='$' . number_format($precio_venta, 2, '.', ',');?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Fecha ingreso:</label>
                                                <p><?=$fecha_ingreso;?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Imagen del producto</label>
                                        <br>
                                        <center>
                                            <img src="<?=$URL.'/almacen/img_productos/'.$imagen;?>" alt="image"  style="width: 160px; height: 160px; object-fit: contain" >
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="index.php" class="btn btn-outline-secondary float-right">Volver</a>
                    </div>

                </div>
            </div>

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include ('../layout/mensajes.php');
include ('../layout/parte2.php');
?>
