<?php

global $pdo, $URL;
include ('../../config.php');

$id_venta   = $_GET['id_venta'];
$nro_venta  = $_GET['nro_venta'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_venta=:id_venta ");

$sentencia->bindParam('id_venta', $id_venta);

if($sentencia->execute()){

    $sentencia2 = $pdo->prepare("DELETE FROM tb_carrito WHERE nro_venta=:nro_venta ");
    $sentencia2->bindParam('nro_venta', $nro_venta);
    $sentencia2->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se Elimió la venta correctamente";
    $_SESSION['icono'] = "success";

    ?>
    <script>
        location.href = "<?=$URL;?>/ventas";
    </script>
    <?php
} else {
    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";

    ?>
    <script>
        location.href = "<?=$URL;?>/ventas";
    </script>
    <?php
}

?>