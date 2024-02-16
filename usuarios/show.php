<?php

global $nombres, $email, $fyh_creacion, $rol;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/usuarios/show_usuario.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Informacion del usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-5">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos registrados</h3>
                    </div>

                    <div class="card-body">
                        <div class="callout callout-danger">
                            <h5 class="text-purple"><b>Usuario: <?=$nombres;?></b></h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <p><?=$nombres;?></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <p><?=$email;?></p>
                                    </div>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rol del usuario</label>
                                        <button class="btn btn-outline-info btn-sm" style="border-radius: 20px"><?=$rol;?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="../usuarios" class="btn btn-outline-secondary float-right">Volver</a>
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
