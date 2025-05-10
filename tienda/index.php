<?php
// index.php

# Cargar configuración
require_once '../config.php';
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

    <?php require_once ROOT_DIR . '/tienda/main.php' ?> 



    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>