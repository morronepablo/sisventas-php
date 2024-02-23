<?php

global $pdo, $id_venta;
$sql_ventas = "
SELECT *,
       cli.nombre_cliente AS nombre_cliente,
       cli.dni_cliente AS dni_cliente,
       cli.celular_cliente AS celular_cliente,
       cli.email_cliente AS email_cliente
FROM tb_ventas AS ve 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = ve.cliente_id 
WHERE ve.id_venta = '$id_venta'
ORDER BY ve.nro_venta ASC
";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

foreach ($ventas_datos as $ventas_dato) {
    $nro_venta  = $ventas_dato['nro_venta'];
    $id_cliente = $ventas_dato['cliente_id'];
}