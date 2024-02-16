<?php

include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de un nuevo rol</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>

                    <form action="../app/controllers/roles/create.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Nombre del rol</label>
                                <input type="text" name="rol" class="form-control" placeholder="Esciba aqui el nombre del nuevo rol..." required>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
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
