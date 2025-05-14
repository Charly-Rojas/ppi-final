<?php
// index.php

# Cargar configuración
require_once '../config.php';
// require_once ROOT_URL . '/conexion.php';    


if (!isset($_SESSION['user_id'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión
    header('Location: ' . ROOT_URL . '/auth/index.php');
    exit();
}


// Cargar carrito
$carrito = [];

if (isset($_COOKIE['carrito'])) {
    $carrito = json_decode($_COOKIE['carrito'], true);
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


    <!-- Historial -->
    <div class="container">
        <h2>Historial de Compras</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $user_id = $_SESSION['user_id'];

                $sql = "
                    SELECT 
                        p.name        AS producto,
                        op.quantity   AS cantidad,
                        op.unit_price AS precio,
                        o.created_at  AS fecha
                    FROM order_products AS op
                    INNER JOIN products AS p
                        ON op.product_id = p.id
                    INNER JOIN orders AS o
                        ON op.order_id = o.id
                    WHERE o.user_id = $user_id
                    ORDER BY o.created_at DESC
                    ";

                    $res = $conn->query($sql);
                if ($res = $conn->query($sql)) {
                    if ($res->num_rows) {
                        echo "<table class='table'>";
                        echo "<thead><tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Fecha</th>
              </tr></thead><tbody>";

                        while ($row = $res->fetch_assoc()) {
                            echo "<tr>
                    <td>{$row['producto']}</td>
                    <td>{$row['cantidad']}</td>
                    <td>{$row['precio']}</td>
                    <td>{$row['fecha']}</td>
                  </tr>";
                        }

                        echo "</tbody></table>";
                    } else {
                        echo "<p>No tienes órdenes registradas.</p>";
                    }
                } else {
                    // Si hay error en la consulta
                    echo "Error en la consulta: " . $conn->error;
                }
            ?>

            </tbody>
        </table>
    </div>




    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>