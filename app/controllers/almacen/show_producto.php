<?php

global $pdo;
$id_producto = $_GET['id'];

$sql_productos = "
SELECT  a.id_producto AS id_producto,
	    a.codigo AS codigo,
        a.nombre AS nombre,
        a.descripcion AS descripcion,
        a.stock AS stock,
        a.stock_minimo AS stock_minimo,
        a.stock_maximo AS stock_maximo,
        a.precio_compra AS precio_compra,
        a.precio_venta AS precio_venta,
        a.fecha_ingreso AS fecha_ingreso,
        a.imagen AS imagen,
        u.id_usuario AS id_usuario,
        u.nombres AS nombres,
        u.email AS email,
        cat.id_categoria AS id_categoria,
        cat.nombre_categoria AS categoria,
        a.fyh_creacion AS fyh_creacion
FROM tb_almacen AS a 
INNER JOIN tb_categorias AS cat ON a.categoria_id = cat.id_categoria 
INNER JOIN  tb_usuarios AS u ON u.id_usuario = a.usuario_id
WHERE id_producto = '$id_producto'";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

foreach ($productos_datos as $productos_dato) {
    $codigo         = $productos_dato['codigo'];
    $nombre         = $productos_dato['nombre'];
    $descripcion    = $productos_dato['descripcion'];
    $stock          = $productos_dato['stock'];
    $stock_minimo   = $productos_dato['stock_minimo'];
    $stock_maximo   = $productos_dato['stock_maximo'];
    $precio_compra  = $productos_dato['precio_compra'];
    $precio_venta   = $productos_dato['precio_venta'];
    $fecha_ingreso  = $productos_dato['fecha_ingreso'];
    $imagen         = $productos_dato['imagen'];
    $id_usuario     = $productos_dato['id_usuario'];
    $email          = $productos_dato['email'];
    $nombres        = $productos_dato['nombres'];
    $id_categoria   = $productos_dato['id_categoria'];
    $categoria      = $productos_dato['categoria'];
    $fyh_creacion   = $productos_dato['fyh_creacion'];
}