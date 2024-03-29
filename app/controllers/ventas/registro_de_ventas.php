<?php

global $pdo, $URL;
include ('../../config.php');

$nro_venta          = $_GET['nro_venta'];
$id_cliente         = $_GET['id_cliente'];
$total_a_cancelar   = $_GET['total_a_cancelar'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas 
        (nro_venta, cliente_id, total_pagado, fyh_creacion) 
VALUES (:nro_venta,:cliente_id,:total_pagado,:fyh_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('cliente_id', $id_cliente);
$sentencia->bindParam('total_pagado', $total_a_cancelar);

$sentencia->bindParam('fyh_creacion', $fechaHora);

if($sentencia->execute()){



    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se registro la venta correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:'.$URL."/compras/");
    ?>
    <script>
        location.href = "<?=$URL;?>/ventas";
    </script>
    <?php
} else {

    $pdo->rollBack();

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

