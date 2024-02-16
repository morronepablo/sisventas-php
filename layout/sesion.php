<?php

global $URL, $pdo;
session_start();
if(isset($_SESSION['sesion_email'])) {
    //echo "si existe sesion";
    $email_sesion = $_SESSION['sesion_email'];
    $sql = "
    SELECT  us.id_usuario AS id_usuario,
	        us.nombres AS nombres,
            us.email AS email,
            rol.rol AS rol
    FROM tb_usuarios AS us 
    INNER JOIN tb_roles AS rol ON us.rol_id = rol.id_rol  WHERE email = '$email_sesion'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($usuarios as $usuario) {
        $id_usuario_sesion = $usuario['id_usuario'];
        $nombres_sesion = $usuario['nombres'];
        $rol_sesion = $usuario['rol'];
    }
} else {
    echo "no existe sesion";
    header('Location: '.$URL.'/login');
}