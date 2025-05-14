<?php

require_once '../config.php';
require_once ROOT_DIR . '/conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Método no permitido');
}

$name         = trim($_POST['name'] ?? '');
$description  = trim($_POST['description'] ?? '');
$manufacturer = trim($_POST['manufacturer'] ?? '');
$origin       = trim($_POST['origin'] ?? '');
$category_id  = (int) ($_POST['category_id'] ?? 0);
$url_img      = trim($_POST['url_img'] ?? '');
$price        = (float) ($_POST['price'] ?? 0);
$stock        = (int) ($_POST['stock'] ?? 0);


$stmt = $conn->prepare("
    INSERT INTO products
        (name, description, manufacturer, origin, category_id, url_img, price, stock)
    VALUES
        (?,       ?,           ?,            ?,      ?,           ?,       ?,     ?)
");

if (! $stmt) {
    die('Error en prepare: ' . $conn->error);
}

$stmt->bind_param(
    'ssissssi',
    $name,
    $description,
    $manufacturer,
    $origin,
    $category_id,
    $url_img,
    $price,
    $stock
);

if ($stmt->execute()) {
    echo '<p style="color:green;">Producto agregado correctamente. ID = ' . $stmt->insert_id . '</p>';
    echo '<p><a href="index.php">Volver al listado</a></p>';
} else {
    echo '<p style="color:red;">Error al insertar: ' . $stmt->error . '</p>';
    echo '<p><a href="javascript:history.back()">Volver</a></p>';
}

$stmt->close();
$conn->close();