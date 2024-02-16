<?php

global $pdo;
$sql_ultimo_id = "SELECT  MAX(id_compra) AS id FROM tb_compras ";

$query_ultimo_id = $pdo->prepare($sql_ultimo_id);
$query_ultimo_id->execute();
$ultimo_id_dato  = $query_ultimo_id->fetchAll(PDO::FETCH_ASSOC);

foreach ($ultimo_id_dato as $ultimo_id_dato) {
    $ultimo_id_dato = $ultimo_id_dato['id'];
}
