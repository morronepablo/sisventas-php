<?php

global $pdo, $URL;
include ('../../config.php');

$nombre_cliente     = $_POST['nombre_cliente'];
$dni_cliente        = $_POST['dni_cliente'];
$celular_cliente    = $_POST['celular_cliente'];
$email_cliente      = $_POST['email_cliente'];

$sentencia = $pdo->prepare("INSERT INTO tb_clientes 
        (nombre_cliente, dni_cliente, celular_cliente, email_cliente, fyh_creacion) 
VALUES (:nombre_cliente,:dni_cliente,:celular_cliente,:email_cliente,:fyh_creacion)");

$sentencia->bindParam('nombre_cliente', $nombre_cliente);
$sentencia->bindParam('dni_cliente', $dni_cliente);
$sentencia->bindParam('celular_cliente', $celular_cliente);
$sentencia->bindParam('email_cliente', $email_cliente);
$sentencia->bindParam('fyh_creacion', $fechaHora);

if($sentencia->execute()){
    ?>
    <script>
        location.href = "<?=$URL;?>/ventas/create.php";
    </script>
    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    //header('Location:'.$URL."/compras/create.php");
    ?>
    <script>
        location.href = "<?=$URL;?>/ventas/create.php";
    </script>
    <?php
}

?>

