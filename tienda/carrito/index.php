<?php
// index.php

# Cargar configuración
require_once '../../config.php';

//Verificar si el usuario está autenticado para ver la pagina
session_start();

if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header('Location: ' . ROOT_URL . '/auth/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda</title>
    <!-- Head -->
    <?php require_once ROOT_DIR . '/includes/head.php' ?>
</head>

<body>
    <!-- SVG icons -->
    <?php require_once ROOT_DIR . '/includes/svg-icons.php' ?>

    <!-- Header -->
    <?php require_once ROOT_DIR . '/includes/header.php' ?>

    

    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>