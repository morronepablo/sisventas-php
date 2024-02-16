<?php

global $productos_datos, $URL, $compras_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/compras/listado_de_compras.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de compras</h1>
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
                            <h3 class="card-title">Compras registradas</h3>
                            <div class="card-tools">
                                <a href="create.php" class="btn btn-outline-primary"><i class="bi bi-plus-square"></i> Crear nueva compra</a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                    <thead class="bg-warning">
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro. compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Fecha compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador_compras = 0;
                                    foreach ($compras_datos as $compras_dato) {
                                        $contador_compras   = $contador_compras + 1;
                                        $id_compra          = $compras_dato['id_compra'];
                                        $nro_compra         = $compras_dato['nro_compra'];
                                        $fecha_compra       = $compras_dato['fecha_compra'];
                                        $comprobante        = $compras_dato['comprobante'];
                                        $precio_compra      = $compras_dato['precio_compra'];
                                        $cantidad           = $compras_dato['cantidad'];

                                        $id_producto        = $compras_dato['id_producto'];
                                        $nombre_producto    = $compras_dato['nombre_producto'];
                                        $codigo             = $compras_dato['codigo'];
                                        $descripcion        = $compras_dato['descripcion'];
                                        $stock              = $compras_dato['stock'];
                                        $stock_minimo       = $compras_dato['stock_minimo'];
                                        $stock_maximo       = $compras_dato['stock_maximo'];
                                        $precio_compra      = $compras_dato['precio_compra'];
                                        $precio_venta       = $compras_dato['precio_venta'];
                                        $fecha_ingreso      = $compras_dato['fecha_ingreso'];
                                        $imagen             = $compras_dato['imagen'];
                                        $id_usuario         = $compras_dato['id_usuario'];
                                        $email              = $compras_dato['email'];
                                        $nombres            = $compras_dato['nombres'];
                                        $id_categoria       = $compras_dato['id_categoria'];
                                        $categoria          = $compras_dato['categoria'];
                                        $fyh_creacion_p     = $compras_dato['fyh_creacion'];

                                        $id_proveedor       = $compras_dato['id_proveedor'];
                                        $nombre_proveedor   = $compras_dato['nombre_proveedor'];
                                        $celular            = $compras_dato['celular'];
                                        $telefono           = $compras_dato['telefono'];
                                        $empresa            = $compras_dato['empresa'];
                                        $email              = $compras_dato['email'];
                                        $direccion          = $compras_dato['direccion'];
                                        $fyh_creacion_pv    = $compras_dato['fyh_creacion_pv'];

                                        $id_usuario         = $compras_dato['id_usuario'];
                                        $nombres            = $compras_dato['nombres'];

                                        ?>
                                        <tr>
                                            <td><center><?=$contador_compras;?></center></td>
                                            <td style="text-align: right"><?=$nro_compra;?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-producto<?=$id_compra?>" style="border-radius: 5px">
                                                    <?=$nombre_producto;?>
                                                </button>
                                                <!-- modal para visualizar producto -->
                                                <div class="modal fade" id="modal-producto<?=$id_compra?>">
                                                    <div class="modal-dialog modal-dialog-centered modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-gradient-info">
                                                                <h4 class="modal-title">Información de producto</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">

                                                                <div class="callout callout-danger">
                                                                    <h5 class="text-purple"><b>Producto: <?=$nombre_producto;?></b></h5>
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
                                                                                        <p><?=$nombre_producto;?></p>
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
                                                                                    <!--<img src="<?=$URL.'/almacen/img_productos/'.$imagen;?>" width="160px" alt="">-->
                                                                                </center>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                            <td><?=$fecha_compra;?></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#modal-proveedor<?=$id_compra?>" style="border-radius: 5px">
                                                    <?=$empresa;?>
                                                </button>
                                                <!-- modal para visualizar proveedor -->
                                                <div class="modal fade" id="modal-proveedor<?=$id_compra?>">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-gradient-info">
                                                                <h4 class="modal-title">Información del proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body text-left">

                                                                <div class="callout callout-danger">
                                                                    <h5 class="text-purple"><b>Proceedor: <?=$nombre_proveedor;?></b></h5>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del proveedor</label>
                                                                                <p><?=$nombre_proveedor;?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label> <br>
                                                                                <a href="https://wa.me/591<?=$celular;?>" target="_blank" class="btn btn-outline-success btn-sm text-success" style="text-decoration: none">
                                                                                    <i class="bi bi-whatsapp"></i>
                                                                                    <?=$celular;?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Telefono</label>
                                                                                <p><?=$telefono;?></p>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa</label>
                                                                                <p><?=$empresa;?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Direccion</label>
                                                                                <p><?=$direccion;?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="">Fecha y Hora creación</label>
                                                                                <p>
                                                                                    <?php
                                                                                    $date = date_create($fyh_creacion_pv);
                                                                                    echo date_format($date, 'd/m/Y H:i:s');
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                            <td><?=$comprobante;?></td>
                                            <td><?=$nombres;?></td>
                                            <td style="text-align: right"><?='$' . number_format($precio_compra, 2, '.', ',');?></td>
                                            <td style="text-align: right"><?=$cantidad;?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?=$id_compra;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                        <a href="update.php?id=<?=$id_compra;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a>
                                                        <a href="delete.php?id=<?=$id_compra;?>" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                                        <th><center>Nro. compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Fecha compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Cantidad</center></th>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Compras",
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
