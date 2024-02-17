<?php

global $pdo, $URL;
include ('../../config.php');

$id_compra          = $_GET['id_compra'];
$id_producto        = $_GET['id_producto'];
$nro_compra         = $_GET['nro_compra'];
$fecha_compra       = $_GET['fecha_compra'];
$id_proveedor       = $_GET['id_proveedor'];
$comprobante        = $_GET['comprobante'];
$id_usuario         = $_GET['id_usuario'];
$precio_compra      = $_GET['precio_compra'];
$cantidad_compra    = $_GET['cantidad_compra'];
$stock_total        = $_GET['stock_total'];

$pdo->beginTransaction();

$sentencia = $pdo->prepare("
UPDATE tb_compras 
SET producto_id=:producto_id, 
    nro_compra=:nro_compra, 
    fecha_compra=:fecha_compra, 
    proveedor_id=:proveedor_id, 
    comprobante=:comprobante, 
    usuario_id=:usuario_id, 
    precio_compra=:precio_compra, 
    cantidad=:cantidad, 
    fyh_actualizacion=:fyh_actualizacion
WHERE id_compra=:id_compra
");

$sentencia->bindParam('producto_id', $id_producto);
$sentencia->bindParam('nro_compra', $nro_compra);
$sentencia->bindParam('fecha_compra', $fecha_compra);
$sentencia->bindParam('proveedor_id', $id_proveedor);
$sentencia->bindParam('comprobante', $comprobante);
$sentencia->bindParam('usuario_id', $id_usuario);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('cantidad', $cantidad_compra);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_compra', $id_compra);

if($sentencia->execute()){

    //Actualiza el stock desde la compra
    $sentencia = $pdo->prepare("UPDATE tb_almacen SET stock=:stock WHERE id_producto=:id_producto ");

    $sentencia->bindParam('stock', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Se Actualizó la compra correctamente";
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
        location.href = "<?=$URL;?>/compras/update.php?id=<?=$id_compra?>";
    </script>
    <?php
}

?>


