<?php
// Llamar a conexion.php para establecer la conexión a la base de datos
require_once ROOT_DIR.'/conexion.php';


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
                            echo '<a href="profile" class="border-0">'.
                                    $_SESSION['user_name']
                                  .'</a>';
                            // logout
                            echo " | ";
                            echo '<a href="'.ROOT_URL.'/auth/index.php?logout=true" class="border-0">
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
                    <li class="pe-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="border-0">
                            <svg class="shopping-cart" width="24" height="24">
                                <use xlink:href="#shopping-cart"></use>
                            </svg>
                        </a>
                    </li>
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