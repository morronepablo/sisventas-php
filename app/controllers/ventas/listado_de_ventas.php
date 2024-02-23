<?php

global $pdo;
$sql_ventas = "
SELECT *,
       cli.nombre_cliente AS nombre_cliente,
       cli.dni_cliente AS dni_cliente,
       cli.celular_cliente AS celular_cliente,
       cli.email_cliente AS email_cliente
FROM tb_ventas AS ve 
INNER JOIN tb_clientes AS cli ON cli.id_cliente = ve.cliente_id 
ORDER BY ve.nro_venta ASC
";
$query_ventas = $pdo->prepare($sql_ventas);
$query_ventas->execute();
$ventas_datos = $query_ventas->fetchAll(PDO::FETCH_ASSOC);

