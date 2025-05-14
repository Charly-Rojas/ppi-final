<?php
require_once '../../config.php';
require_once ROOT_DIR . '/conexion.php';

$nombre = trim($_POST['nombre'] ?? '');
$direccion = trim($_POST['direccion'] ?? '');
$id = $_SESSION['user_id'];
$status = 'pending';
$total = 0;

if (isset($_COOKIE['carrito'])) {
    $carrito = json_decode($_COOKIE['carrito'], true);
} else{
    header('Location: '.ROOT_URL.'/tienda/checkout/index.php?message=carrito_vacio&type=error');
}


if (empty($carrito)) {
    header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=No hay productos válidos en el carrito&type=error');
}

// Verificar que haya stock para cada producto
$sql = "SELECT id, stock, price FROM products WHERE id IN (" . implode(',', array_keys($carrito)) . ")";
$res = $conn->query($sql);
if ($res && $res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        if ($row['stock'] < $carrito[$row['id']]) {
            header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=Stock insuficiente para el producto ' . $row['id'] . '&type=error');
            exit;
        }
        $total += $row['price'] * $carrito[$row['id']];
    }
} else {
    header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=No se encontraron productos en el carrito&type=error');
    exit;
}


//  Inserta la orden en 'orders'
$sql = "INSERT INTO orders (user_id, status, total, shipping_address)
        VALUES ($id, '$status', $total, '$direccion')";
echo $sql;
$res = $conn->query($sql);
if (!$res) {
    header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=Error al insertar en orden&type=error');
}
$orderId = $conn->insert_id;

//  Inserta cada línea en 'order_products' y descuenta stock
foreach ($carrito as $pid => $qty) {
    // Inserta en 'order_products'
    $sql = "INSERT INTO order_products (order_id, product_id, quantity, unit_price)
            VALUES ($orderId, $pid, $qty, (SELECT price FROM products WHERE id = $pid))";
    if (!$conn->query($sql)) {
        header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=Error al insertar en order_products&type=error');
        exit;
    }

    // Descuenta stock
    $sql = "UPDATE products SET stock = stock - $qty WHERE id = $pid";
    if (!$conn->query($sql)) {
        header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=Error al descontar stock&type=error');
        exit;
    }
}

// Commit y limpieza de carrito
setcookie('carrito', '', time() - 3600, '/');

//Respuesta al usuario
    header('Location: ' . ROOT_URL . '/tienda/checkout/index.php?message=Gracias por tu compra');

