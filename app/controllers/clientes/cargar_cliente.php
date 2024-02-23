<?php

global $pdo, $id_cliente;
$sql_clientes = "
SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' 
";
$query_clientes = $pdo->prepare($sql_clientes);
$query_clientes->execute();
$clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

foreach ($clientes_datos as $clientes_dato) {
    $nombre_cliente     = $clientes_dato['nombre_cliente'];
    $dni_cliente        = $clientes_dato['dni_cliente'];
    $celular_cliente    = $clientes_dato['celular_cliente'];
    $email_cliente      = $clientes_dato['email_cliente'];
}