<?php

global $pdo, $URL;
include ('../../config.php');

$id_usuario     = $_POST['id_usuario'];
$rol            = $_POST['rol'];
$nombres        = $_POST['nombres'];
$email          = $_POST['email'];
$password_user  = $_POST['password_user'];
$password_repet = $_POST['password_repet'];

if($password_user == ""){
    $sentencia = $pdo->prepare("UPDATE tb_usuarios 
    SET nombres=:nombres, 
        email=:email,
        rol_id=:rol_id,
        fyh_actualizacion=:fyh_actualizacion 
    WHERE id_usuario=:id_usuario ");

    $sentencia->bindParam('nombres', $nombres);
    $sentencia->bindParam('email', $email);
    $sentencia->bindParam('rol_id', $rol);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el usuarios correctamente";
    $_SESSION['icono'] = "success";
    header('Location:'.$URL."/usuarios");

}else{

    if($password_user == $password_repet){
        //echo "las contraseñas son iguales";
        $options = [
            'cost' => 10,
        ];
        $password_user = password_hash($password_user, PASSWORD_BCRYPT, $options);
        $sentencia = $pdo->prepare("UPDATE tb_usuarios 
        SET nombres=:nombres, 
            email=:email, 
            rol_id=:rol_id,
            password_user=:password_user,
            fyh_actualizacion=:fyh_actualizacion 
        WHERE id_usuario=:id_usuario ");

        $sentencia->bindParam('nombres', $nombres);
        $sentencia->bindParam('email', $email);
        $sentencia->bindParam('rol_id', $rol);
        $sentencia->bindParam('password_user', $password_user);
        $sentencia->bindParam('fyh_actualizacion', $fechaHora);
        $sentencia->bindParam('id_usuario', $id_usuario);
        $sentencia->execute();

        session_start();
        $_SESSION['mensaje'] = "Se actualizó el usuarios correctamente";
        $_SESSION['icono'] = "success";
        header('Location:'.$URL."/usuarios");

    }else{
        echo "las contraseñas no son iguales";
        session_start();
        $_SESSION['mensaje'] = "Las contraseñas introducidas no son iguales";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
        //header('Location: '.$URL.'/usuarios/update.php?id='.$id_usuario);
    }
}

?>