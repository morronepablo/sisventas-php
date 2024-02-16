<?php

global $pdo, $URL;
include ('../../config.php');

$rol = $_POST['rol'];

$sentencia = $pdo->prepare("INSERT INTO tb_roles 
        (rol, fyh_creacion) 
VALUES (:rol,:fyh_creacion)");

$sentencia->bindParam('rol', $rol);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se registro el rol correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/roles");
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}

