<?php

global $nombres, $email, $id_usuario, $roles_datos, $rol_id, $rol;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/usuarios/update_usuario.php');
include ('../app/controllers/roles/listado_de_roles.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar usuario</h1>
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

                    <form action="../app/controllers/usuarios/update.php" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="id_usuario" value="<?=$id_usuario?>" hidden>
                                        <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" placeholder="Esciba aqui el nombre del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" value="<?=$email;?>" class="form-control" placeholder="Esciba aqui el email del nuevo usuario..." required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol del usuario</label>
                                        <select name="rol" id="" class="form-control">
                                            <?php
                                                foreach ($roles_datos as $roles_dato) {
                                                    $rol_tabla  = $roles_dato['rol'];
                                                    $id_rol     = $roles_dato['id_rol'];
                                            ?>
                                                    <option value="<?=$id_rol?>" <?php if($rol_tabla == $rol) { ?> selected="selected" <?php } ?>>
                                                        <?php echo $rol_tabla;?>
                                                    </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="password_user" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Repetir contraseña</label>
                                        <input type="password" name="password_repet" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-outline-success">Guardar</button>
                            <a href="../usuarios" class="btn btn-outline-secondary float-right">Cancelar</a>
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
