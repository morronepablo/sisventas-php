<?php

global $pdo;
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
       pro.fyh_creacion AS fyh_creacion_p 
FROM tb_compras AS co 
INNER JOIN tb_almacen as pro ON co.producto_id = pro.id_producto 
INNER JOIN tb_categorias AS cat ON pro.categoria_id = cat.id_categoria 
INNER JOIN tb_usuarios AS u ON u.id_usuario = pro.usuario_id 
INNER JOIN tb_proveedores AS prov ON co.proveedor_id = prov.id_proveedor 
";
$query_compras = $pdo->prepare($sql_compras);
$query_compras->execute();
$compras_datos = $query_compras->fetchAll(PDO::FETCH_ASSOC);

