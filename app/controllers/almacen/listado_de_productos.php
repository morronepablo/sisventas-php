<?php

global $pdo;
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
        u.nombres AS nombres,
        cat.id_categoria AS id_categoria,
        cat.nombre_categoria AS categoria,
        a.fyh_creacion AS fyh_creacion
FROM tb_almacen AS a 
INNER JOIN tb_categorias AS cat ON a.categoria_id = cat.id_categoria 
INNER JOIN  tb_usuarios AS u ON u.id_usuario = a.usuario_id
";
$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();
$productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

