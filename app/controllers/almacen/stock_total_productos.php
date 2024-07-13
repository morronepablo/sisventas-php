<?php

global $pdo;
$sql_stock_total = "
SELECT SUM(a.stock) AS stock_total
FROM tb_almacen AS a
";
$query_stock_total = $pdo->prepare($sql_stock_total);
$query_stock_total->execute();
$stock_total = $query_stock_total->fetch(PDO::FETCH_ASSOC);
