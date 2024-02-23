<?php

global $pdo, $URL;
include ('../../config.php');

$nro_venta      = $_GET['nro_venta'];
$id_producto    = $_GET['id_producto'];
$cantidad       = $_GET['cantidad'];



$sentencia = $pdo->prepare("INSERT INTO tb_carrito 
        (nro_venta, producto_id, cantidad, fyh_creacion) 
VALUES (:nro_venta,:producto_id,:cantidad,:fyh_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('producto_id', $id_producto);
$sentencia->bindParam('cantidad', $cantidad);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if($sentencia->execute()){
    ?>
    <script>
        location.href = "<?=$URL;?>/ventas/create.php";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    //header('Location:'.$URL."/compras/create.php");
    ?>
    <script>
        location.href = "<?=$URL;?>/ventas/create.php";
    </script>
    <?php
}



?>