<?php

global $pdo, $URL;
include ('../../config.php');

$id_categoria       = $_GET['id_categoria'];
$nombre_categoria   = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("UPDATE tb_categorias 
SET nombre_categoria=:nombre_categoria, 
    fyh_actualizacion=:fyh_actualizacion 
WHERE id_categoria=:id_categoria ");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_categoria', $id_categoria);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó la categoría correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:'.$URL."/categorias");
?>
    <script>
        location.href = "<?=$URL;?>/categorias";
    </script>
<?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    //header('Location:'.$URL."/categorias");
?>
    <script>
        location.href = "<?=$URL;?>/categorias";
    </script>
<?php
}
?>