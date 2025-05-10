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


    <!-- Tienda  en inicio-->
    <div class="container-md">
        <?php
        // Si no hay categoria en el GET, mostrar todos los productos (category="" or !isset($_GET['category']))
        if (!isset($_GET['category'])) {
            require_once ROOT_DIR . '/tienda/main.php';
        } else {
            // Si hay categoria en el GET, mostrar solo los productos de esa categoria
            require_once ROOT_DIR . '/tienda/category.php';
        }
        ?>
    </div>



    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>