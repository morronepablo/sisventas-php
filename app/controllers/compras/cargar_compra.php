<?php

global $pdo;

$id_compra = $_GET['id'];

$sql_compras = "
SELECT *,
       pro.id_producto AS id_producto,
       pro.codigo AS codigo, 
       pro.nombre AS nombre_producto, 
       pro.descripcion AS descripcion, 
       pro.stock AS stock, 
       pro.stock_minimo AS stock_minimo, 
       pro.stock_maximo AS stock_maximo, 
       pro.precio_compra AS precio_compra, 
       pro.precio_venta AS precio_venta, 
       pro.fecha_ingreso AS fecha_ingreso, 
       pro.imagen AS imagen,
       prov.id_proveedor AS id_proveedor,
       prov.nombre_proveedor AS nombre_proveedor,
       prov.celular AS celular,
       prov.telefono AS telefono,
       prov.empresa AS empresa,
       prov.email AS email,
       prov.direccion AS direccion,
       prov.fyh_creacion AS fyh_creacion_pv,
       u.id_usuario AS id_usuario,
       u.nombres AS nombres,
       cat.id_categoria AS id_categoria,
       cat.nombre_categoria AS categoria,
       pro.categoria_id AS categoria_id, 
       pro.fyh_creacion AS fyh_creacion_p,
       co.nro_compra AS nro_compra,
       co.fecha_compra AS fecha_compra,
       co.comprobante AS comprobante,
       co.precio_compra AS precio_compra_total,
       co.cantidad AS cantidad_compra
FROM tb_compras AS co 
INNER JOIN tb_almacen as pro ON co.producto_id = pro.id_producto 
INNER JOIN tb_categorias AS cat ON pro.categoria_id = cat.id_categoria 
INNER JOIN tb_usuarios AS u ON u.id_usuario = co.usuario_id 
INNER JOIN tb_proveedores AS prov ON co.proveedor_id = prov.id_proveedor 
WHERE co.id_compra = '$id_compra'
";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

foreach ($compras_datos as $compras_dato) {
    $id_producto            = $compras_dato['id_producto'];
    $codigo                 = $compras_dato['codigo'];
    $categoria              = $compras_dato['categoria'];
    $nombre_producto        = $compras_dato['nombre_producto'];
    $descripcion            = $compras_dato['descripcion'];
    $fyh_creacion_p         = $compras_dato['fyh_creacion_p'];
    $stock                  = $compras_dato['stock'];
    $stock_minimo           = $compras_dato['stock_minimo'];
    $stock_maximo           = $compras_dato['stock_maximo'];
    $precio_compra          = $compras_dato['precio_compra'];
    $precio_venta           = $compras_dato['precio_venta'];
    $fecha_ingreso          = $compras_dato['fecha_ingreso'];
    $imagen                 = $compras_dato['imagen'];

    $id_proveedor_tabla     = $compras_dato['id_proveedor'];
    $nombre_proveedor_tabla = $compras_dato['nombre_proveedor'];
    $celular_tabla          = $compras_dato['celular'];
    $telefono_tabla         = $compras_dato['telefono'];
    $empresa_tabla          = $compras_dato['empresa'];
    $email_tabla            = $compras_dato['email'];
    $direccion_tabla        = $compras_dato['direccion'];

    $id_compra              = $compras_dato['id_compra'];
    $nro_compra             = $compras_dato['nro_compra'];
    $fecha_compra           = $compras_dato['fecha_compra'];
    $comprobante            = $compras_dato['comprobante'];
    $precio_compra_total    = $compras_dato['precio_compra_total'];
    $cantidad_compra        = $compras_dato['cantidad_compra'];
    $nombres                = $compras_dato['nombres'];
}

