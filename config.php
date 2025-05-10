<?php
// config.php

$env = parse_ini_file(__DIR__ . '/.env');

define('ROOT_URL', $env['ROOT_URL']);
define('DB_HOST', $env['DB_HOST']);
define('DB_USER', $env['DB_USER']);
define('DB_PASS', $env['DB_PASS']);
define('DB_NAME', $env['DB_NAME']);


define('ROOT_DIR', __DIR__);


echo "<!-- Configuración de rutas -->\n";
echo "<!-- ROOT_URL: " . htmlspecialchars(ROOT_URL) . " -->\n";
echo "<!-- ROOT_DIR: " . htmlspecialchars(ROOT_DIR) . " -->\n";

// Iniciar la sesión
session_start();

?>