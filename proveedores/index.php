<?php


global $roles_datos, $categorias_datos, $proveedores_datos;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/proveedores/listado_de_proveedores.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de proveedores</h1>
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
                            <h3 class="card-title">Proveedores registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-create">
                                    <i class="bi bi-plus-square"></i> Crear nuevo proveedor
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped table-sm table-hover">
                                <thead class="bg-warning">
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del proveedor</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Teléfono</center></th>
                                    <th><center>Empresa</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Dirección</center></th>
                                    <th><center>Acciones</center></th>
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
                                        <td>
                                            <center>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-update<?=$id_proveedor;?>" style="border-radius: 5px">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <!-- modal para actualizar proveedor -->
                                                    <div class="modal fade" id="modal-update<?=$id_proveedor;?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-gradient-success">
                                                                    <h4 class="modal-title">Actualización de proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del proveedor <b>*</b></label>
                                                                                <input type="text" id="nombre_proveedor<?=$id_proveedor;?>" value="<?=$nombre_proveedor;?>" class="form-control">
                                                                                <small style="color: red; display: none" id="lbl_nombre<?=$id_proveedor;?>">* Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular <b>*</b></label>
                                                                                <input type="number" id="celular<?=$id_proveedor;?>" value="<?=$celular;?>" class="form-control">
                                                                                <small style="color: red; display: none" id="lbl_celular<?=$id_proveedor;?>">* Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" id="telefono<?=$id_proveedor;?>" value="<?=$telefono;?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa <b>*</b></label>
                                                                                <input type="text" id="empresa<?=$id_proveedor;?>" value="<?=$empresa;?>" class="form-control">
                                                                                <small style="color: red; display: none" id="lbl_empresa<?=$id_proveedor;?>">* Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email</label>
                                                                                <input type="email" id="email<?=$id_proveedor;?>" value="<?=$email;?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección <b>*</b></label>
                                                                                <textarea id="direccion<?=$id_proveedor;?>" cols="30" rows="3" class="form-control"><?=$direccion;?></textarea>
                                                                                <small style="color: red; display: none" id="lbl_direccion<?=$id_proveedor;?>">* Este campo es requerido</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-outline-success" id="btn_update<?=$id_proveedor;?>">Actualizar</button>
                                                                </div>
                                                                <div id="respuesta_update<?=$id_proveedor;?>"></div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_update<?=$id_proveedor;?>').click(function () {

                                                            var id_proveedor        = '<?=$id_proveedor;?>';
                                                            var nombre_proveedor    = $('#nombre_proveedor<?=$id_proveedor;?>').val();
                                                            var celular             = $('#celular<?=$id_proveedor;?>').val();
                                                            var telefono            = $('#telefono<?=$id_proveedor;?>').val();
                                                            var empresa             = $('#empresa<?=$id_proveedor;?>').val();
                                                            var email               = $('#email<?=$id_proveedor;?>').val();
                                                            var direccion           = $('#direccion<?=$id_proveedor;?>').val();


                                                            //limpieza de errores
                                                            $('#lbl_nombre').css('display','none');
                                                            $('#lbl_celular').css('display','none');
                                                            $('#lbl_empresa').css('display','none');
                                                            $('#lbl_direccion').css('display','none');

                                                            if(nombre_proveedor == "") {
                                                                $('#nombre_proveedor<?=$id_proveedor;?>').focus();
                                                                $('#lbl_nombre<?=$id_proveedor;?>').css('display','block');
                                                            } else if(celular == "") {
                                                                $('#celular<?=$id_proveedor;?>').focus();
                                                                $('#lbl_celular<?=$id_proveedor;?>').css('display','block');
                                                            } else if(empresa == "") {
                                                                $('#empresa<?=$id_proveedor;?>').focus();
                                                                $('#lbl_empresa<?=$id_proveedor;?>').css('display','block');
                                                            } else if(direccion == "") {
                                                                $('#direccion<?=$id_proveedor;?>').focus();
                                                                $('#lbl_direccion<?=$id_proveedor;?>').css('display','block');
                                                            } else {
                                                                var url = "../app/controllers/proveedores/update.php";

                                                                $.get(url,{
                                                                    id_proveedor:id_proveedor,
                                                                    nombre_proveedor:nombre_proveedor,
                                                                    celular:celular,
                                                                    telefono:telefono,
                                                                    empresa:empresa,
                                                                    email:email,
                                                                    direccion:direccion
                                                                },function (datos) {
                                                                    $('#respuesta_update<?=$id_proveedor;?>').html(datos);
                                                                });
                                                            }

                                                        });
                                                    </script>

                                                </div>

                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete<?=$id_proveedor;?>" style="border-radius: 5px">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <!-- modal para eliminar proveedor -->
                                                    <div class="modal fade" id="modal-delete<?=$id_proveedor;?>">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-gradient-danger">
                                                                    <h4 class="modal-title">¿Esta seguri de eliminar al proveedor?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-left">

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del proveedor</label>
                                                                                <input type="text" id="nombre_proveedor<?=$id_proveedor;?>" value="<?=$nombre_proveedor;?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular</label>
                                                                                <input type="number" id="celular<?=$id_proveedor;?>" value="<?=$celular;?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Teléfono</label>
                                                                                <input type="number" id="telefono<?=$id_proveedor;?>" value="<?=$telefono;?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa</label>
                                                                                <input type="text" id="empresa<?=$id_proveedor;?>" value="<?=$empresa;?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Email</label>
                                                                                <input type="email" id="email<?=$id_proveedor;?>" value="<?=$email;?>" class="form-control" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección</label>
                                                                                <textarea id="direccion<?=$id_proveedor;?>" cols="30" rows="3" class="form-control" disabled><?=$direccion;?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-outline-danger" id="btn_delete<?=$id_proveedor;?>">Eliminar</button>
                                                                </div>
                                                                <div id="respuesta_delete<?=$id_proveedor;?>"></div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_delete<?=$id_proveedor;?>').click(function () {
                                                            var id_proveedor = '<?=$id_proveedor;?>';

                                                            var url = "../app/controllers/proveedores/delete.php";

                                                            $.get(url,{
                                                                id_proveedor:id_proveedor
                                                            },function (datos) {
                                                                $('#respuesta_delete<?=$id_proveedor;?>').html(datos);
                                                            });
                                                        });
                                                    </script>
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
                                    <th><center>Nombre del proveedor</center></th>
                                    <th><center>Celular</center></th>
                                    <th><center>Teléfono</center></th>
                                    <th><center>Empresa</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Dirección</center></th>
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


<!-- modal para registrar proveedores -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h4 class="modal-title">Creación de proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre del proveedor <b>*</b></label>
                            <input type="text" id="nombre_proveedor" class="form-control">
                            <small style="color: red; display: none" id="lbl_nombre">* Este campo es requerido</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Celular <b>*</b></label>
                            <input type="number" id="celular" class="form-control">
                            <small style="color: red; display: none" id="lbl_celular">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Teléfono</label>
                            <input type="number" id="telefono" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Empresa <b>*</b></label>
                            <input type="text" id="empresa" class="form-control">
                            <small style="color: red; display: none" id="lbl_empresa">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Dirección <b>*</b></label>
                            <textarea id="direccion" cols="30" rows="3" class="form-control"></textarea>
                            <small style="color: red; display: none" id="lbl_direccion">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer justify-content-between bg-gradient-light">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-primary" id="btn_create">Guardar</button>
            </div>
            <div id="respuesta"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    $('#btn_create').click(function () {
        var nombre_proveedor    = $('#nombre_proveedor').val();
        var celular             = $('#celular').val();
        var telefono            = $('#telefono').val();
        var empresa             = $('#empresa').val();
        var email               = $('#email').val();
        var direccion           = $('#direccion').val();

        //limpieza de errores
        $('#lbl_nombre').css('display','none');
        $('#lbl_celular').css('display','none');
        $('#lbl_empresa').css('display','none');
        $('#lbl_direccion').css('display','none');

        if(nombre_proveedor == "") {
            $('#nombre_proveedor').focus();
            $('#lbl_nombre').css('display','block');
        } else if(celular == "") {
            $('#celular').focus();
            $('#lbl_celular').css('display','block');
        } else if(empresa == "") {
            $('#empresa').focus();
            $('#lbl_empresa').css('display','block');
        } else if(direccion == "") {
            $('#direccion').focus();
            $('#lbl_direccion').css('display','block');
        } else {
            var url = "../app/controllers/proveedores/create.php";

            $.get(url,{
                nombre_proveedor:nombre_proveedor,
                celular:celular,
                telefono:telefono,
                empresa:empresa,
                email:email,
                direccion:direccion
            },function (datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>

