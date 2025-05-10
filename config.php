<?php
// config.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



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


// Funciones
function print_product_card($id, $name, $price, $image_url) {

if (!file_exists(ROOT_DIR . '/images/' . $image_url)) {
    $image_url = 'product.jpg';
}
    echo '
    <div class="col mb-4">
        <div class="product-card position-relative" style="cursor: pointer; object-fit: contain;">
            <div class="card-img border-rounded-10" id="' . htmlspecialchars($id) . '" style="transition: background-color 0.3s;">
                <img src="' . ROOT_URL . '/images/' . htmlspecialchars($image_url) . '" alt="product-item" class="product-image img-fluid border-rounded-10">
                <div class="cart-concern position-absolute d-flex justify-content-center">
                    <div class="cart-button d-flex gap-2 justify-content-center align-items-center">';

                    if (isset($_SESSION['user_id'])) {
                        echo '<button type="button" onclick="addToCart(\'' . htmlspecialchars($id) . '\')" class="btn btn-light">
                            <i class="fa-solid fa-cart-plus"></i>
                        </button>';
                    } else {
                        echo '<a href="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="">
                                <button type="button" class="btn btn-light">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </a>';
                    }
                    echo '
                        <a href="' . ROOT_URL . '/producto?id=' . htmlspecialchars($id) . '">
                            <button type="button" class="btn btn-light" data-bs-toggle="modal">
                                <i class="fa-solid fa-right-long"></i>
                            </button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                <h3 class="card-title fs-6 fw-normal m-0">
                    ' . htmlspecialchars($name) . '
                </h3>
                <span class="card-price fw-bold">$' . htmlspecialchars($price) . '</span>
            </div>
        </div>
    </div>';
}
?>