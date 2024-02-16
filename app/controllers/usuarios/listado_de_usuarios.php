<?php

global $pdo;

$sql_usuarios = "
SELECT  us.id_usuario AS id_usuario,
	    us.nombres AS nombres,
        us.email AS email,
        rol.rol AS rol
FROM tb_usuarios AS us 
INNER JOIN tb_roles AS rol ON us.rol_id = rol.id_rol 
";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);