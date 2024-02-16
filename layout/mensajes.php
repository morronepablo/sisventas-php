<?php
if(isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje'];
    $icono = $_SESSION['icono'];
    ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "<?=$icono;?>",
            title: "<?=$respuesta;?>",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
    <?php
    unset($_SESSION['mensaje'], $_SESSION['icono']);
}
?>