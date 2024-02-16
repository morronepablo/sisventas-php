<?php

global $pdo;
$id_usuario = $_GET['id'];

$sql_usuarios = "
SELECT  us.id_usuario AS id_usuario,
	    us.nombres AS nombres,
        us.email AS email,
        rol.id_rol AS id_rol,
        rol.rol AS rol,
        us.fyh_creacion AS fyh_creacion
FROM tb_usuarios AS us 
INNER JOIN tb_roles AS rol ON us.rol_id = rol.id_rol 
WHERE id_usuario = '$id_usuario'
";
$query_usuarios = $pdo->prepare($sql_usuarios);
$query_usuarios->execute();
$usuarios_datos = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);

foreach ($usuarios_datos as $usuarios_dato) {
    $nombres        = $usuarios_dato['nombres'];
    $email          = $usuarios_dato['email'];
    $id_rol         = $usuarios_dato['id_rol'];
    $rol            = $usuarios_dato['rol'];
    $fyh_creacion   = $usuarios_dato['fyh_creacion'];
}