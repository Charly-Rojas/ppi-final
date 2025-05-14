<?php
// index.php

# Cargar configuración
require_once '../../config.php';


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


    <!-- Checkout -->
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">Checkout</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h5 class="mb-3">Productos en el carrito</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach ($carrito as $id => $cantidad) {
                            $sql = "SELECT name, price, url_img FROM products WHERE id = '$id'";
                            $res = $conn->query($sql);
                            if ($res && $res->num_rows > 0) {
                                $producto = $res->fetch_assoc();
                                $subtotal = $producto['price'] * $cantidad;
                                $total += $subtotal;
                                echo "<tr>";
                                echo "<td width=\"50px\"><img class=\"\" src=\"" . ROOT_URL . "/images/" . htmlspecialchars($producto['url_img']) . "\" height=\"80px\"></td>";
                                echo "<td>" . htmlspecialchars($producto['name']) . "</td>";
                                echo "<td>$" . htmlspecialchars($producto['price']) . "</td>";
                                echo "<td>" . htmlspecialchars($cantidad) . "</td>";
                                echo "<td>$" . htmlspecialchars($subtotal) . "</td>";
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h5 class="mt-3 mb-3 text-end">Total: $<?php echo htmlspecialchars($total); ?></h5>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-8">
                <h5 class="mb-3">Detalles de envío</h5>
                <form action="<?php echo ROOT_URL; ?>/tienda/checkout/confirm.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" value="Carlos" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" value="Calle Anahuac" id="direccion" name="direccion" required>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Confirmar pedido</button>
                    </div>
                </form>
            </div>

        </div>





        <!-- Footer -->
        <?php require_once ROOT_DIR . '/includes/footer.php' ?>

        <!-- JavaScript -->
        <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>