<?php

global $URL, $usuarios_datos, $roles_datos, $rol_sesion, $categorias_datos, $productos_datos, $proveedores_datos;
include ('app/config.php');
include ('layout/sesion.php');

include ('layout/parte1.php');

include ('app/controllers/usuarios/listado_de_usuarios.php');
include ('app/controllers/roles/listado_de_roles.php');
include ('app/controllers/categorias/listado_de_categorias.php');
include ('app/controllers/almacen/listado_de_productos.php');
include ('app/controllers/proveedores/listado_de_proveedores.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenido al SISTEMA DE VENTAS - <?=$rol_sesion;?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <br><br>

            <div class="row">

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($usuarios_datos as $usuarios_dato){
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?=$contador_usuarios;?></h3>
                            <p>Usuarios registrados</p>
                        </div>
                        <a href="<?=$URL;?>/usuarios/create.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?=$URL;?>/usuarios" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($roles_datos as $roles_dato){
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?=$contador_roles;?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <a href="<?=$URL;?>/roles/create.php">
                            <div class="icon">
                                <i class="fas fa-address-card"></i>
                            </div>
                        </a>
                        <a href="<?=$URL;?>/roles" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php
                            $contador_categorias = 0;
                            foreach ($categorias_datos as $categorias_dato){
                                $contador_categorias = $contador_categorias + 1;
                            }
                            ?>
                            <h3><?=$contador_categorias;?></h3>
                            <p>Categorías registradas</p>
                        </div>
                        <a href="<?=$URL;?>/categorias">
                            <div class="icon">
                                <i class="fas fa-tags"></i>
                            </div>
                        </a>
                        <a href="<?=$URL;?>/categorias" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <?php
                            $contador_productos = 0;
                            foreach ($productos_datos as $productos_datos){
                                $contador_productos = $contador_productos + 1;
                            }
                            ?>
                            <h3><?=$contador_productos;?></h3>
                            <p>Productos registrados</p>
                        </div>
                        <a href="<?=$URL;?>/almacen/create.php">
                            <div class="icon">
                                <i class="fas fa-list"></i>
                            </div>
                        </a>
                        <a href="<?=$URL;?>/almacen" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <?php
                            $contador_proveedores = 0;
                            foreach ($proveedores_datos as $proveedores_dato){
                                $contador_proveedores = $contador_proveedores + 1;
                            }
                            ?>
                            <h3><?=$contador_proveedores;?></h3>
                            <p>Proveedores registrados</p>
                        </div>
                        <a href="<?=$URL;?>/proveedores/">
                            <div class="icon">
                                <i class="fas fa-car"></i>
                            </div>
                        </a>
                        <a href="<?=$URL;?>/proveedores" class="small-box-footer">
                            Más información <i class="fas fa-arrow-circle-right"></i>
                        </a>
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
include ('layout/parte2.php');
?>

















