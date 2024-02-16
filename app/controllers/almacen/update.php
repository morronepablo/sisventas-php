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
$id_usuario         = $_POST['id_usuario'];
$id_categoria       = $_POST['id_categoria'];
$id_producto        = $_POST['id_producto'];
$imagen_text        = $_POST['imagen_text'];

//Logica si cambio la imagen
if($_FILES['imagen']['name'] != null) {
    //echo "hay imagen nuevo";
    $nombreDelArchivo   = date("Y-m-d-h-i-s");
    $rutaEliminar = "/almacen/img_productos/".$imagen_text;
    //eliminado imagen anterior del servidor
    unlink('../../../almacen/img_productos/'.$imagen_text);
    $imagen_text        = $nombreDelArchivo."_".$_FILES['imagen']['name'];
    $location           = "../../../almacen/img_productos/".$imagen_text;
    //guardando imagen nueva en servidor
    move_uploaded_file($_FILES['imagen']['tmp_name'],$location);
}

$sentencia = $pdo->prepare("UPDATE tb_almacen 
SET codigo=:codigo, 
    nombre=:nombre, 
    descripcion=:descripcion, 
    stock=:stock, 
    stock_minimo=:stock_minimo, 
    stock_maximo=:stock_maximo, 
    precio_compra=:precio_compra, 
    precio_venta=:precio_venta, 
    fecha_ingreso=:fecha_ingreso, 
    imagen=:imagen, 
    usuario_id=:usuario_id, 
    categoria_id=:categoria_id, 
    fyh_actualizacion=:fyh_actualizacion 
WHERE id_producto=:id_producto ");

$sentencia->bindParam('codigo', $codigo);
$sentencia->bindParam('nombre', $nombre);
$sentencia->bindParam('descripcion', $descripcion);
$sentencia->bindParam('stock', $stock);
$sentencia->bindParam('stock_minimo', $stock_minimo);
$sentencia->bindParam('stock_maximo', $stock_maximo);
$sentencia->bindParam('precio_compra', $precio_compra);
$sentencia->bindParam('precio_venta', $precio_venta);
$sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
$sentencia->bindParam('imagen', $imagen_text);
$sentencia->bindParam('usuario_id', $id_usuario);
$sentencia->bindParam('categoria_id', $id_categoria);
$sentencia->bindParam('fyh_actualizacion', $fechaHora);
$sentencia->bindParam('id_producto', $id_producto);

if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el producto correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/almacen");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    header('Location:'.$URL."/almacen/update.php?id=".$id_producto);
}
