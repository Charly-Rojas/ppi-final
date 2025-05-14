<?php
// Conexion a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (! $conn->set_charset('utf8mb4')) {
    printf("Error cargando el conjunto de caracteres utf8mb4: %s\n", $conn->error);
    exit();
}

?>