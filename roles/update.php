<?php

global $rol, $id_rol;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/roles/update_roles.php')

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar el rol</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>

                    <form action="../app/controllers/roles/update.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nombre del rol</label>
                                <input type="text" name="id_rol" value="<?=$id_rol;?>" hidden>
                                <input type="text" name="rol" value="<?=$rol;?>" class="form-control" placeholder="Esciba aqui el nombre del nuevo rol..." required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-success">Actualizar</button>
                            <a href="index.php" class="btn btn-outline-secondary float-right">Cancelar</a>
                        </div>
                    </form>
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
