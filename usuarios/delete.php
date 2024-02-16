<?php

global $nombres, $email, $fyh_creacion, $id_usuario, $rol;
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
                    <h1 class="m-0">Eliminar usuario</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-5">
                <form action="../app/controllers/usuarios/delete_usuario.php" method="post">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">¿Está seguro de eliminar el usuario?</h3>
                        </div>

                        <div class="card-body">
                            <div class="callout callout-danger">
                                <input type="text" name="id_usuario" value="<?=$id_usuario;?>" hidden>
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
                                            <p><?=$fyh_creacion;?></p>
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
                            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                            <a href="../usuarios" class="btn btn-outline-secondary float-right">Cancelar</a>
                        </div>

                    </div>
                </form>
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
