<?php
// Conexion a la base de datos
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);  
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>