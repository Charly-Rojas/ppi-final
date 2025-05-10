<?php
// Llamar a conexion.php para establecer la conexión a la base de datos
require_once ROOT_DIR . '/conexion.php';


?>

<header id="header" class="site-header text-black">
    <div class="header-top border-bottom py-2">
        <div class="container-lg">
            <div class="row justify-content-evenly">
                <div class="col d-none d-md-block">
                    <p class="text-center text-black m-0"><strong>Oferta espacial</strong>: Envio gratis a partir de $499 de compra</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <nav id="header-nav" class="navbar navbar-expand-lg">
        <div class="container-lg">
            <a class="navbar-brand" href="index.html">
                <img src="<?php echo ROOT_URL; ?>/images/logoAureaUrbana.png" class="logo img-fluid" alt="logo" style="width: auto; height: 6em;">
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
                            <a class="nav-link me-5 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link me-5 dropdown-toggle border-0 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'tienda/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/tienda" data-bs-toggle="dropdown"
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
                            <a class="nav-link me-5 <?php echo ($_SERVER['REQUEST_URI'] == ROOT_URL . '/' . 'nosotros/' ? 'active' : ''); ?>" href="<?php echo ROOT_URL; ?>/nosotros">Nosotros</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="user-items ps-0 ps-md-5">
                <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
                    <li class="pe-3">
                        <?php
                        if (isset($_SESSION['user_id'])) {
                            echo '<a href="profile" class="border-0">' .
                                $_SESSION['user_name']
                                . '</a>';
                            // logout
                            echo " | ";
                            echo '<a href="' . ROOT_URL . '/auth/index.php?logout=true" class="border-0">
                                    Cerrar sesión
                                  </a>';
                        } else {
                            echo '<a href="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="border-0">
                                    <svg class="user" width="24" height="24">
                                        <use xlink:href="#user"></use>
                                    </svg>
                                  </a>';
                        }
                        ?>
                    </li>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                    ?>
                        <li class="pe-3">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="border-0">
                                <svg class="shopping-cart" width="24" height="24">
                                    <use xlink:href="#shopping-cart"></use>
                                </svg>
                            </a>
                        </li>
                    <?php
                    }
                    ?>
                    <li>
                        <a href="#" class="search-item border-0" data-bs-toggle="collapse" data-bs-target="#search-box" aria-label="Toggle navigation">
                            <svg class="search" width="24" height="24">
                                <use xlink:href="#search"></use>
                            </svg>
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="shopping-cart">
                    <div class="shopping-cart-content">



                    <?php
                        foreach ($carrito as $id) {
                    ?>
                        <div class="mini-cart cart-list p-0 mt-3">
                            <div class="mini-cart-item d-flex border-bottom pb-3">
                                <div class="col-lg-2 col-md-3 col-sm-2 me-4">
                                    <a href="#" title="product-image">
                                        <img src="images/single-product-thumb1.jpg" class="img-fluid" alt="single-product-item">
                                    </a>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-8">
                                    <div class="product-header d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="product-title fs-6 me-5">Sport Shoes For Men</h4>
                                        <a href="" class="remove" aria-label="Remove this item" data-product_id="11913"
                                            data-cart_item_key="abc" data-product_sku="">
                                            <svg class="close">
                                                <use xlink:href="#close"></use>
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="quantity-price d-flex justify-content-between align-items-center">
                                        <div class="input-group product-qty">
                                            <button type="button"
                                                class="quantity-left-minus btn btn-light rounded-0 rounded-start btn-number"
                                                data-type="minus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#minus"></use>
                                                </svg>
                                            </button>
                                            <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                                            <button type="button" class="quantity-right-plus btn btn-light rounded-0 rounded-end btn-number"
                                                data-type="plus">
                                                <svg width="16" height="16">
                                                    <use xlink:href="#plus"></use>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="price-code">
                                            <span class="product-price fs-6">$99</span>
                                        </div>
                                    </div>
                                    <!-- quantity-price -->
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                        ?>

                        <!-- cart-list -->
                        <div class="mini-cart-total d-flex justify-content-between py-4">
                            <span class="fs-6">Subtotal:</span>
                            <span class="special-price-code">
                                <span class="price-amount amount fs-6" style="opacity: 1;">
                                    <bdi>
                                        <span class="price-currency-symbol">$</span>198.00 </bdi>
                                </span>
                            </span>
                        </div>
                        <div class="modal-footer my-4 justify-content-center">
                            <button type="button" class="btn btn-red hvr-sweep-to-right dark-sweep">View Cart</button>
                            <button type="button"
                                class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>