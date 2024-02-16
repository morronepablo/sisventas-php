<?php

global $productos_datos, $categorias_datos, $email_sesion, $id_usuario_sesion, $URL, $ultimo_id_dato;
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/almacen/ultimo_id.php');
include ('../app/controllers/categorias/listado_de_categorias.php');

?>

<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de un nuevo producto</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Llene los datos</h3>
                    </div>

                    <form action="../app/controllers/almacen/create.php" method="post" enctype="multipart/form-data">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Codigo:</label>
                                                <div style="display: flex">
                                                    <?php
                                                        function ceros($numero) {
                                                            $len = 0;
                                                            $cantidad_ceros = 5;
                                                            $aux = $numero;
                                                            $pos = strlen($numero);
                                                            $len = $cantidad_ceros - $pos;
                                                            for ($i = 0; $i < $len; $i++) {
                                                                $aux = "0".$aux;
                                                            }
                                                            return $aux;
                                                        }
                                                    ?>
                                                    <input type="text" class="form-control" value="<?="P-".ceros($ultimo_id_dato + 1);?>">
                                                    <input type="text" name="codigo" value="<?="P-".ceros($ultimo_id_dato + 1);?>" hidden>
                                                    <a href="<?=$URL;?>/almacen/create.php" style="margin-left: 1px" class="btn btn-success"><i class="bi bi-arrow-clockwise"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Categoría:</label>
                                                <div style="display: flex">
                                                    <select name="id_categoria" id="" class="form-control">
                                                        <?php
                                                        foreach ($categorias_datos as $categorias_dato) { ?>
                                                            <option value="<?=$categorias_dato['id_categoria'];?>"><?=$categorias_dato['nombre_categoria'];?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <a href="<?=$URL;?>/categorias" style="margin-left: 1px" class="btn btn-primary"><i class="bi bi-file-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombre del producto:</label>
                                                <input type="text" name="nombre" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Usuario</label>
                                                <input type="text" value="<?=$email_sesion;?>" class="form-control" disabled>
                                                <input type="text" name="id_usuario" value="<?=$id_usuario_sesion;?>" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="">Descripción:</label>
                                                <textarea name="descripcion" id="" cols="30" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock:</label>
                                                <input type="number" name="stock" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock mínimo:</label>
                                                <input type="number" name="stock_minimo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Stock máximo:</label>
                                                <input type="number" name="stock_maximo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio compra:</label>
                                                <input type="number" step="0.01" name="precio_compra" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Precio venta:</label>
                                                <input type="number" step="0.01" name="precio_venta" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label for="">Fecha ingreso:</label>
                                                <input type="date" name="fecha_ingreso" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Imagen del producto</label>
                                        <input type="file" name="imagen" id="file" class="form-control">
                                        <br>
                                        <center>
                                            <output id="list"></output>
                                        </center>
                                        <script>
                                            function archivo(evt) {
                                                var files = evt.target.files; // FileList object
                                                // Obtenemos la imagen del campo "file".
                                                for (var i = 0, f; f = files[i]; i++) {
                                                    //Solo admitimos imágenes.
                                                    if (!f.type.match('image.*')) {
                                                        continue;
                                                    }
                                                    var reader = new FileReader();
                                                    reader.onload = (function (theFile) {
                                                        return function (e) {
                                                            // Insertamos la imagen
                                                            document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="170px" title="', escape(theFile.name), '"/>'].join('');
                                                        };
                                                    })(f);
                                                    reader.readAsDataURL(f);
                                                }
                                            }
                                            document.getElementById('file').addEventListener('change', archivo, false);
                                        </script>
                                    </div>
                                </div>
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
