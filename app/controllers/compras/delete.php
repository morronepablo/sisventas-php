<?php

global $pdo, $URL;
include ('../../config.php');

$id_compra          = $_GET['id_compra'];
$id_producto        = $_GET['id_producto'];
$cantidad_compra    = $_GET['cantidad_compra'];
$stock_actual       = $_GET['stock_actual'];

//echo $id_compra." - ".$id_producto." - ".$cantidad_compra." - ".$stock_actual;


$pdo->beginTransaction();

$sentencia = $pdo->prepare("DELETE FROM tb_compras WHERE id_compra=:id_compra ");

$sentencia->bindParam('id_compra', $id_compra);

if($sentencia->execute()){

    //Actualiza el stock desde la compra
    $stock = $stock_actual - $cantidad_compra;
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto=:id_producto ");

    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se Elimió la compra correctamente";
    $_SESSION['icono'] = "success";
    //header('Location:'.$URL."/compras/");
    ?>
    <script>
        location.href = "<?=$URL;?>/compras";
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
        location.href = "<?=$URL;?>/compras/delete.php?id=<?=$id_compra?>";
    </script>
    <?php
}

?>