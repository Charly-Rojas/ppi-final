<?php
// Conexión a la base de datos
require_once '../config.php';


// Validar que el usuario esté en sesión y que su ID sea 1
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
    // Redirigir al usuario a la página de inicio de sesión si no cumple con la validación
    header('Location: ' . ROOT_URL . '/auth/index.php?message=Acceso denegado&type=error');
    exit;
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

    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Barra lateral -->
                <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="?page=productos">Productos</a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <!-- Contenido principal -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <?php
                    // Determinar la página actual
                    $page = isset($_GET['page']) ? $_GET['page'] : 'main';

                    // Cargar la página correspondiente
                    switch ($page) {
                        case 'productos':
                            include 'productos.php';
                            break;
                        case 'historial':
                            include 'historial.php';
                            break;
                        case 'usuarios':
                            include 'usuarios.php';
                            break;
                        default:
                            include 'productos.php';
                            break;
                    }
                    ?>
                </main>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Footer -->
        <?php require_once ROOT_DIR . '/includes/footer.php' ?>

        <!-- JavaScript -->
        <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
    </body>

</html>