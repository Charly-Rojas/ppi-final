<?php
// Llamar a conexion.php para establecer la conexión a la base de datos
require_once ROOT_DIR . '/conexion.php';


?>
<!-- Global header -->
<header id="header" class="site-header text-black">
    <div class="header-top border-bottom py-2">
        <div class="container-lg">
            <div class="row justify-content-evenly">
                <div class="col d-none d-md-block">
                    <p class="text-center text-black m-0"><strong>Oferta espacial</strong>: Envio gratis a en cualquier producto</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav id="header-nav" class="navbar navbar-expand-lg">
        <div class="container-lg">
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo ROOT_URL; ?>/images/logoAureaUrbana.png" class="logo img-fluid" alt="logo">
            </a>
            <button class="navbar-toggler d-flex d-lg-none order-3 border-0 p-1 ms-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="navbar-icon">
                    <use xlink:href="#navbar-icon"></use>
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar">
                <div class="offcanvas-header px-4 pb-0">
                    <a class="navbar-brand ps-3" href="index.html">
                        <img src="<?php echo ROOT_URL; ?>/images/logoAureaUrbana.png" class="logo img-fluid" alt="logo" style="width: auto; height: 6em;">
                    </a>
                    <button type=" button" class="btn-close btn-close-black p-5" data-bs-dismiss="offcanvas" aria-label="Close"
                        data-bs-target="#bdNavbar"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="navbar" class="navbar-nav justify-content-end align-items-center flex-grow-1">
                        <li class="nav-item">
                            <a style="font-size: 1em" class="nav-link me-5 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a style="font-size: 1em" class="nav-link me-5 dropdown-toggle border-0 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda" data-bs-toggle="dropdown"
                                aria-expanded="false">Tienda</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda">Inicio </a>
                                </li>
                                <li>
                                    <a class="dropdown-item <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/?category=sudaderas' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda?category=sudaderas">Sudaderas </a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/?category=camisetas' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda?category=camisetas">Camisetas</a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/?category=accesorios' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda?category=accesorios">Accesorios</a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/?category=calzado' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda?category=calzado">Calzado</a>
                                </li>
                                <li>
                                    <a class="dropdown-item  <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/?category=pantalones' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda?category=pantalones">Pantalones</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a style="font-size: 1em" class="nav-link me-5 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'nosotros/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/nosotros">Nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="user-items ps-0 ps-md-5">
                <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                    ?>
                        <li class="pe-1 d-flex align-items-center">
                            <?php echo $_SESSION['user_name'] ?>
                        </li>
                        <li class="pe-1">
                            <a href="<?php echo ROOT_URL ?>/auth/index.php?logout=true" class="border-0 btn btn-light rounded-circle" data-bs-toggle="tooltip" title="Cerrar sesión">
                                <i class="fa-solid fa-right-from-bracket"></i>
                            </a>
                        </li>
                        <li class="pe-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="border-0 btn btn-light rounded-circle" data-bs-toggle="tooltip" title="Carrito">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <a href="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="border-0 btn btn-light rounded-circle">
                            <i class="fa-solid fa-right-to-bracket"></i>
                        </a>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="#" class="search-item border-0 btn btn-light rounded-circle" data-bs-toggle="collapse" data-bs-target="#search-box" aria-label="Toggle navigation">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>




<?php
$carrito = [];

if (isset($_COOKIE['carrito'])) {
    $carrito = json_decode($_COOKIE['carrito'], true);
}

?>


<!-- cart view -->
<div class="modal fade" id="modallong" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title fs-5">Cart</h2>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark" style="font-size: 1.5rem;"></i>
                </button>
            </div>
            <div class="modal-body">
                <?php

                // Si el carrito está vacío, mostrar mensaje
                if (empty($carrito)) {
                    echo '<div class="d-flex flex-column align-items-center justify-content-center py-5">';
                    echo '<i class="fa-solid fa-cart-arrow-down fa-3x mb-3"></i>';
                    echo '<p class="text-center">El carrito está vacío</p>';
                    echo '<a href="' . ROOT_URL . '/tienda" class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Comienza a agregar productos</a>';
                    echo '</div>';
                } else {
                    // Obtener los productos del carrito (ids) desde la base de datos
                    $sql = "SELECT id, name, price, url_img as image_url FROM products WHERE id IN (" . implode(',', array_keys($carrito)) . ")";

                    if ($conn->query($sql) === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        $result = $conn->query($sql);
                    }
                    // Agregar la cantidad desde carrito id=>cantidad a la variable result
                    $result = array_map(function ($producto) use ($carrito) {
                        $producto['cantidad'] = $carrito[$producto['id']];
                        return $producto;
                    }, $result->fetch_all(MYSQLI_ASSOC));
                    // Mostrar los productos del carrito


                    //Inicializar la variable de total
                    $total = 0;


                ?>
                    <div class="shopping-cart">
                        <div class="shopping-cart-content">


                            <?php
                            foreach ($result as $producto) {
                                $id = $producto['id'];
                                $nombre = $producto['name'];
                                $precio = $producto['price'];
                                $imagen = $producto['image_url'];
                                $cantidad = $producto['cantidad'];
                                $subtotal = $precio * $cantidad;
                                $total += $subtotal;
                            ?>
                                <div class="mini-cart cart-list p-0 mt-3" data-product-id="<?php echo $id; ?>" data-price="<?php echo $precio; ?>">
                                    <div class="mini-cart-item d-flex border-bottom pb-3">
                                        <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                                            <img src="<?php echo ROOT_URL ?>/images/<?php echo $imagen ?>" class="img-fluid" alt="Imagen de producto">
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-8">
                                            <div class="product-header d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="product-title fs-6 me-5"><?php echo $nombre ?></h4>
                                                <button class="btn btn-sm btn bg-gray rounded remove-from-cart" data-product-id="<?php echo $id; ?>">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="input-group product-qty">
                                                <button type="button" class="quantity-left-minus btn btn-light rounded-start" data-action="minus">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input type="text" class="form-control quantity-input text-center" value="<?php echo $cantidad ?>" readonly>
                                                <button type="button" class="quantity-right-plus btn btn-light rounded-end" data-action="plus">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                            <div class="price-code">
                                                <span class="product-price fs-6">$<span class="subtotal"><?php echo number_format($subtotal, 2); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="mini-cart-total d-flex justify-content-between py-4">
                            <span class="fs-6">Subtotal:</span>
                            <span class="special-price-code fs-6">
                                $<span id="total-cart"><?php echo number_format($total, 2) ?></span>
                            </span>
                        </div>


                        <div class="modal-footer my-4 justify-content-center">
                            <a href="<?php echo ROOT_URL ?>/tienda/checkout">
                                <button type="button" class="btn btn-outline-dark">Checkout</button>
                            </a>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
</div>


<!-- Login modal -->
<div class="modal fade" id="modallogin" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen-md-down modal-md modal-dialog-centered" role="document">
        <div class="modal-content p-4">
            <div class="modal-header mx-auto border-0">
                <h2 class="modal-title fs-3 fw-normal" id="modal-title">Inicia sesión</h2>
                <button type="button" class="btn position-absolute top-0 end-0 m-2 rounded-circle" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark" style="font-size: 1.5rem;"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="login-detail">
                    <!-- Formulario de inicio de sesión -->
                    <div id="login-form-wrapper">
                        <form id="login-form" action="<?php echo ROOT_URL ?>/auth/index.php" method="post">
                            <input type="text" name="username" placeholder="Correo*" class="mb-3 ps-3 text-input">
                            <input type="password" name="password" placeholder="Contraseña" class="ps-3 text-input">
                            <div class="checkbox d-flex justify-content-between mt-4">
                                <label>
                                    <input name="rememberme" type="checkbox" id="remember-me" value="forever"> Recuérdame
                                </label>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button id="submit-login" type="submit" class="mb-3 ps-3 btn btn-primary mt-2">Iniciar sesión</button>
                            </div>
                        </form>
                    </div>

                    <!-- Formulario de registro -->
                    <div id="register-form-wrapper" class="d-none">
                        <form id="register-form" action="<?php echo ROOT_URL ?>/auth/index.php" method="post">
                            <input type="text" name="name" placeholder="Nombre completo*" class="mb-3 ps-3 text-input">
                            <input type="email" name="email" placeholder="Correo*" class="mb-3 ps-3 text-input">
                            <input type="password" name="password" placeholder="Contraseña" class="mb-3 ps-3 text-input">
                            <input type="password" name="confirm_password" placeholder="Confirmar contraseña" class="mb-3 ps-3 ps-3 text-input">
                            <div class="d-flex justify-content-center">
                                <button id="submit-register" type="submit" class="btn btn-primary ">Registrarse</button>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer mt-2 mb-3 d-flex justify-content-center gap-3">
                        <button id="toggle-form" type="button" class="btn btn-light btn-outline-dark">Crear cuenta</button>
                    </div>
                    <script>
                        document.getElementById('toggle-form').addEventListener('click', function() {
                            const loginForm = document.getElementById('login-form-wrapper');
                            const registerForm = document.getElementById('register-form-wrapper');
                            const toogleButton = document.getElementById('toggle-form');
                            const modalTitle = document.getElementById('modal-title');
                            loginForm.classList.toggle('d-none');
                            registerForm.classList.toggle('d-none');
                            if (loginForm.classList.contains('d-none')) {
                                toogleButton.innerText = 'Iniciar sesión';
                                modalTitle.innerText = 'Crear cuenta';
                            } else {
                                toogleButton.innerText = 'Crear cuenta';
                                modalTitle.innerText = 'Inicia sesión';
                            }

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Toast Bootstrap para mensajes -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1100">
    <div id="liveToast" class="toast align-items-center text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage">
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto"
                data-bs-dismiss="toast" aria-label="Cerrar"></button>
        </div>
    </div>
</div>