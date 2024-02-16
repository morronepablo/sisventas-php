<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato, $proveedores_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/proveedores/listado_de_proveedores.php');
include ('../app/controllers/compras/ultimo_id.php');

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
                            <h1 class="m-0">Registro de una nueva compra</h1>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Llene los datos</h3>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body" style="display: block">
                                            <div style="display: flex; align-items: center">
                                                <h5 class="m-0 mr-2">Datos del producto</h5>
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
                                            </div>
                                            <hr>
                                            <div class="row" style="font-size: 12px">
                                                <div class="col-md-9">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <input type="text" id="id_producto" hidden>
                                                                <label for="">Codigo:</label>
                                                                <h5 class="text-success" id="codigo"></h5>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Categoría:</label>
                                                                <div style="display: flex">
                                                                    <p id="categoria"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Nombre de producto:</label>
                                                            <div class="form-group">
                                                                <p id="nombre_producto"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="">Descripción:</label>
                                                                <p id="descripcion_producto"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="">Fecha y Hora creación</label>
                                                                <p id="fyh_creacion"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock:</label>
                                                                <p id="stock" style="background-color: #fff819; text-align: right; padding-right: 10px; border-radius: 5px;"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo:</label>
                                                                <p id="stock_minimo" style="text-align: right; padding-right: 10px;"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo:</label>
                                                                <p id="stock_maximo" style="text-align: right; padding-right: 10px;"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio compra:</label>
                                                                <p id="precio_compra" style="text-align: right; padding-right: 10px;"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio venta:</label>
                                                                <p id="precio_venta" style="text-align: right; padding-right: 10px;"></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Fecha ingreso:</label>
                                                                <p id="fecha_ingreso"></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <br>
                                                        <center>
                                                            <img  id="img_producto" style="width: 160px; height: 160px; object-fit: contain; display: none;" >
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr>
                                            <div style="display: flex; align-items: center">
                                                <h5 class="m-0 mr-2">Datos del proveedor</h5>
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-buscar_proveedor" style="border-radius: 5px">
                                                    <i class="fa fa-search"></i>
                                                    Buscar porveedor
                                                </button>
                                                <!-- modal para visualizar proveedor -->
                                                <div class="modal fade" id="modal-buscar_proveedor">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-gradient-info">
                                                                <h4 class="modal-title">Busqueda del proveedor</h4>
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
                                                                            <th><center>Nombre del proveedor</center></th>
                                                                            <th><center>Celular</center></th>
                                                                            <th><center>Teléfono</center></th>
                                                                            <th><center>Empresa</center></th>
                                                                            <th><center>Email</center></th>
                                                                            <th><center>Dirección</center></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $contador_proveedores = 0;
                                                                        foreach ($proveedores_datos as $proveedores_dato) {
                                                                            $contador_proveedores   = $contador_proveedores + 1;
                                                                            $id_proveedor           = $proveedores_dato['id_proveedor'];
                                                                            $nombre_proveedor       = $proveedores_dato['nombre_proveedor'];
                                                                            $celular                = $proveedores_dato['celular'];
                                                                            $telefono               = $proveedores_dato['telefono'];
                                                                            $empresa                = $proveedores_dato['empresa'];
                                                                            $email                  = $proveedores_dato['email'];
                                                                            $direccion              = $proveedores_dato['direccion'];
                                                                            ?>
                                                                            <tr>
                                                                                <td><center><?=$contador_proveedores;?></center></td>
                                                                                <td>
                                                                                    <center>
                                                                                        <button class="btn btn-outline-info btn-sm" id="btn_seleccionar_proveedor<?=$id_proveedor;?>">
                                                                                            Seleccionar
                                                                                        </button>
                                                                                        <script>
                                                                                            $('#btn_seleccionar_proveedor<?=$id_proveedor;?>').click(function () {

                                                                                                var id_proveedor = '<?=$id_proveedor?>';
                                                                                                $('#id_proveedor').val(id_proveedor);

                                                                                                var nombre_proveedor = '<?=$nombre_proveedor?>';
                                                                                                $('#nombre_proveedor').val(nombre_proveedor);

                                                                                                var celular = '<?=$celular?>';
                                                                                                $('#celular').val(celular);

                                                                                                var telefono = '<?=$telefono?>';
                                                                                                $('#telefono').val(telefono);

                                                                                                var empresa = '<?=$empresa?>';
                                                                                                $('#empresa').val(empresa);

                                                                                                var email = '<?=$email?>';
                                                                                                $('#email').val(email);

                                                                                                var direccion = '<?=$direccion?>';
                                                                                                $('#direccion').val(direccion);

                                                                                                $('#modal-buscar_proveedor').modal('toggle');
                                                                                            });
                                                                                        </script>
                                                                                    </center>
                                                                                </td>
                                                                                <td><?=$nombre_proveedor;?></td>
                                                                                <td>
                                                                                    <center>
                                                                                        <a href="https://wa.me/591<?=$celular;?>" target="_blank" class="btn btn-outline-success btn-sm">
                                                                                            <i class="bi bi-whatsapp"></i>
                                                                                            <?=$celular;?>
                                                                                        </a>
                                                                                    </center>
                                                                                </td>
                                                                                <td><?=$telefono;?></td>
                                                                                <td><?=$empresa;?></td>
                                                                                <td><?=$email;?></td>
                                                                                <td><?=$direccion;?></td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                        <tfoot class="bg-warning disabled">
                                                                        <tr>
                                                                            <th><center>Nro</center></th>
                                                                            <th><center>Seleccionar</center></th>
                                                                            <th><center>Nombre del proveedor</center></th>
                                                                            <th><center>Celular</center></th>
                                                                            <th><center>Teléfono</center></th>
                                                                            <th><center>Empresa</center></th>
                                                                            <th><center>Email</center></th>
                                                                            <th><center>Dirección</center></th>
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
                                            </div>

                                            <hr>

                                            <div class="container-fluid" style="font-size: 12px">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <input type="text" id="id_proveedor" hidden>
                                                            <label for="">Nombre del proveedor</label>
                                                            <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Celular</label>
                                                            <input type="number" id="celular" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Teléfono</label>
                                                            <input type="number" id="telefono" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Empresa</label>
                                                            <input type="text" id="empresa" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" id="email" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Dirección</label>
                                                            <textarea id="direccion" cols="30" rows="1" class="form-control" disabled></textarea>
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
                                    <div class="card card-outline card-primary">
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
                                                        <input type="text" value="<?=$ultimo_id_dato + 1;?>" class="form-control text-right" disabled>
                                                        <input type="text" value="<?=$ultimo_id_dato + 1;?>" id="nro_compra" hidden>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Fecha compra</label>
                                                        <input type="date" id="fecha_compra" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Comprobante</label>
                                                        <input type="text" id="comprobante" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <input type="number" step="0.01" id="compra_precio" class="form-control text-right">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Stock actual</label>
                                                        <input type="number" id="stock_actual" class="form-control text-right" style="background-color: #fff819" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Stock total</label>
                                                        <input type="number" id="stock_total" class="form-control text-right" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Cantidad compra</label>
                                                        <input type="number" id="cantidad_compra" class="form-control text-right">
                                                    </div>
                                                    <script>
                                                        $('#cantidad_compra').keyup(function () {
                                                            //alert('estamos presionando el input');
                                                            var stock_actual = $('#stock_actual').val();
                                                            var stock_compra = $('#cantidad_compra').val();

                                                            var total = parseInt(stock_actual)  + parseInt(stock_compra) ;

                                                            $('#stock_total').val(total);
                                                        });
                                                    </script>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input type="text" class="form-control" value="<?=$email_sesion;?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button id="btn_guardar_compra" class="btn btn-primary btn-block">Guardar compra</button>
                                                </div>
                                            </div>
                                            <script>
                                                $('#btn_guardar_compra').click(function () {

                                                    var id_producto     = $('#id_producto').val();
                                                    var nro_compra      = $('#nro_compra').val();
                                                    var fecha_compra    = $('#fecha_compra').val();
                                                    var id_proveedor    = $('#id_proveedor').val();
                                                    var comprobante     = $('#comprobante').val();
                                                    var id_usuario      = '<?=$id_usuario_sesion;?>';
                                                    var precio_compra   = $('#compra_precio').val();
                                                    var cantidad_compra = $('#cantidad_compra').val();
                                                    var stock_total     = $('#stock_total').val();

                                                    if(id_producto == "") {
                                                        $('#id_producto').focus();
                                                        alert('debe seleccionar un producto !!!!');
                                                    } else if(fecha_compra == "") {
                                                        $('#fecha_compra').focus();
                                                        alert('debe ingresar fecha compra !!!!');
                                                    } else if(comprobante == "") {
                                                        $('#comprobante').focus();
                                                        alert('debe ingresar comprobante !!!!');
                                                    } else if(precio_compra == "") {
                                                        $('#precio_compra').focus();
                                                        alert('debe ingresar el precio de compra !!!!');
                                                    } else if(cantidad_compra == "") {
                                                        $('#cantidad_compra').focus();
                                                        alert('debe ingresar la cantidad de la compra !!!!');
                                                    } else {

                                                        var url = "../app/controllers/compras/create.php";

                                                        $.get(url,{
                                                            id_producto:id_producto,
                                                            nro_compra:nro_compra,
                                                            fecha_compra:fecha_compra,
                                                            id_proveedor:id_proveedor,
                                                            comprobante:comprobante,
                                                            id_usuario:id_usuario,
                                                            precio_compra:precio_compra,
                                                            cantidad_compra:cantidad_compra,
                                                            stock_total:stock_total
                                                        },function (datos) {
                                                            $('#respuesta_create').html(datos);
                                                        });

                                                    }

                                                });
                                            </script>
                                        </div>

                                    </div>

                                </div>

                                <div id="respuesta_create"></div>

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