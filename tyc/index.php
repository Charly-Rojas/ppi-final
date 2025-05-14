<?php
// index.php

# Cargar configuración
require_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nosotros</title>
    <!-- Head -->
    <?php require_once ROOT_DIR . '/includes/head.php' ?>
    <style>
        h2 {
            font-size: 1.3em;
        }
    </style>
</head>

<body>
    <!-- SVG icons -->
    <?php require_once ROOT_DIR . '/includes/svg-icons.php' ?>

    <!-- Header -->
    <?php require_once ROOT_DIR . '/includes/header.php' ?>

    <!-- Términos y condiciones -->
    <section class="terms-and-conditions">
        <div class="container">
            <h1>Términos y Condiciones</h1>
            <p>Bienvenido a nuestra página de términos y condiciones. Por favor, lea cuidadosamente los siguientes términos antes de utilizar nuestro sitio web.</p>
            <h2 >Uso del sitio</h2>
            <p>Al acceder y utilizar este sitio, usted acepta cumplir con estos términos y condiciones. Si no está de acuerdo, por favor no utilice este sitio.</p>
            <h2 >Propiedad intelectual</h2>
            <p>Todo el contenido de este sitio, incluyendo texto, imágenes, logotipos y diseño, es propiedad de la empresa y está protegido por las leyes de derechos de autor.</p>
            <h2 >Limitación de responsabilidad</h2>
            <p>No nos hacemos responsables de ningún daño directo o indirecto que pueda surgir del uso de este sitio.</p>
            <h2 >Modificaciones</h2>
            <p>Nos reservamos el derecho de modificar estos términos en cualquier momento. Por favor, revise esta página periódicamente para estar al tanto de los cambios.</p>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>