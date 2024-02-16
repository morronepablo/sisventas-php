<?php

global $pdo, $URL;
include ('../../config.php');

$id_producto = $_POST['id_producto'];
$imagen_text = $_POST['imagen_text'];

$sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto=:id_producto ");

$sentencia->bindParam('id_producto', $id_producto);

if($sentencia->execute()){
    session_start();
    unlink('../../../almacen/img_productos/'.$imagen_text);
    $_SESSION['mensaje'] = "Se eliminó el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/almacen");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.$URL."/almacen/delete.php?id=".$id_producto);
}

