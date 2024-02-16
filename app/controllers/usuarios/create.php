<?php

global $pdo, $URL;
include ('../../config.php');

$nombres        = $_POST['nombres'];
$email          = $_POST['email'];
$rol_id         = $_POST['rol_id'];
$password_user  = $_POST['password_user'];
$password_repet = $_POST['password_repet'];

if($password_user == $password_repet) {
    $options = [
        'cost' => 10,
    ];
    $password_user = password_hash($password_user, PASSWORD_BCRYPT, $options);
    $sentencia = $pdo->prepare("INSERT INTO tb_usuarios 
            (nombres, email, rol_id, password_user, fyh_creacion) 
    VALUES (:nombres,:email,:rol_id,:password_user,:fyh_creacion)");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('rol_id', $rol_id);
    $sentencia->bindParam('password_user', $password_user);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->execute();

    session_start();
    $_SESSION['mensaje'] = "Se registro el usuario correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/usuarios");
} else {
    echo "Error, las contraseñas no son iguales.";
    session_start();
    $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
    //header('Location: '.$URL.'/usuarios/create.php');
}




