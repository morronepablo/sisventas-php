<?php

global $pdo, $URL;
include ('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor ");

$sentencia->bindParam('id_proveedor', $id_proveedor);

if($sentencia->execute()){
    session_start();
    //echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se eliminó el proveedor correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:'.$URL."/categorias");
    ?>
    <script>
        location.href = "<?=$URL;?>/proveedores";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    //header('Location:'.$URL."/categorias");
    ?>
    <script>
        location.href = "<?=$URL;?>/proveedores";
    </script>
    <?php
}
?>