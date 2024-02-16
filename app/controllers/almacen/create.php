<?php

global $pdo, $URL;
include ('../../config.php');

$codigo             = $_POST['codigo'];
$nombre             = $_POST['nombre'];
$descripcion        = $_POST['descripcion'];
$stock              = $_POST['stock'];
$stock_minimo       = $_POST['stock_minimo'];
$stock_maximo       = $_POST['stock_maximo'];
$precio_compra      = $_POST['precio_compra'];
$precio_venta       = $_POST['precio_venta'];
$fecha_ingreso      = $_POST['fecha_ingreso'];

$imagen             = $_POST['imagen'];

$nombreDelArchivo   = date("Y-m-d-h-i-s");
$filename           = $nombreDelArchivo."_".$_FILES['imagen']['name'];
$location           = "../../../almacen/img_productos/".$filename;

move_uploaded_file($_FILES['imagen']['tmp_name'],$location);

$id_usuario         = $_POST['id_usuario'];
$id_categoria       = $_POST['id_categoria'];



$sentencia = $pdo->prepare("INSERT INTO tb_almacen 
        (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, usuario_id, categoria_id, fyh_creacion) 
VALUES (:codigo,:nombre,:descripcion,:stock,:stock_minimo,:stock_maximo,:precio_compra,:precio_venta,:fecha_ingreso,:imagen,:usuario_id,:categoria_id,:fyh_creacion)");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $filename);
$sentencia->bindParam('usuario_id', $id_usuario);
$sentencia->bindParam('categoria_id', $id_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/almacen");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

