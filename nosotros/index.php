<?php
// index.php

# Cargar configuración
require_once '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nosotros</title>
    <!-- Head -->
    <?php require_once ROOT_DIR . '/includes/head.php' ?>
</head>

<body>
    <!-- SVG icons -->
    <?php require_once ROOT_DIR . '/includes/svg-icons.php' ?>

    <!-- Header -->
    <?php require_once ROOT_DIR . '/includes/header.php' ?>

    <section id="intro" class="position-relative mt-4">
        <div class="container-lg">
            <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
                            <img src="<?php echo ROOT_URL; ?>/images/card-image1.jpg" alt="shoes" class="img-fluid jarallax-img">
                            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                <h2 class="card-title display-3 light">Stylish shoes for Women</h2>
                                <a href="index.html"
                                    class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="row g-4">
                            <div class="col-lg-12 mb-4">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="<?php echo ROOT_URL; ?>/images/card-image2.jpg" alt="shoes" class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Sports Wear</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="<?php echo ROOT_URL; ?>/images/card-image3.jpg" alt="shoes" class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Fashion Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="card d-flex flex-row align-items-end border-0 large jarallax-keep-img">
                            <img src="<?php echo ROOT_URL; ?>/images/card-image4.jpg" alt="shoes" class="img-fluid jarallax-img">
                            <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                <h2 class="card-title display-3 light">Stylish shoes for men</h2>
                                <a href="index.html"
                                    class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="row g-4">
                            <div class="col-lg-12 mb-4">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="<?php echo ROOT_URL; ?>/images/card-image5.jpg" alt="shoes" class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Men Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card d-flex flex-row align-items-end border-0 jarallax-keep-img">
                                    <img src="<?php echo ROOT_URL; ?>/images/card-image6.jpg" alt="shoes" class="img-fluid jarallax-img">
                                    <div class="cart-concern p-3 m-3 p-lg-5 m-lg-5">
                                        <h2 class="card-title style-2 display-4 light">Women Shoes</h2>
                                        <a href="index.html"
                                            class="text-uppercase light mt-3 d-inline-block text-hover fw-bold light-border">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
        <div class="container">
            <div class="bg-gray coupon position-relative p-5">
                <div class="bold-text position-absolute">10% OFF</div>
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7 col-md-12 mb-3">
                        <div class="coupon-header">
                            <h2 class="display-7">10% OFF Discount Coupons</h2>
                            <p class="m-0">Subscribe us to get 10% OFF on all the purchases</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="btn-wrap">
                            <a href="#" class="btn btn-black btn-medium text-uppercase hvr-sweep-to-right">Email me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about-us" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="<?php echo ROOT_URL; ?>/images/about-us.jpg" alt="Sobre Nosotros" class="img-fluid rounded">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5">Sobre Nosotros</h2>
                    <p class="lead">Somos un equipo apasionado dedicado a ofrecerte lo mejor en moda y estilo. Nuestra misión es proporcionar productos de alta calidad que inspiren confianza e individualidad.</p>
                    <p>Con años de experiencia en la industria, nos enorgullece ofrecer una selección cuidadosamente curada de calzado elegante y cómodo para cada ocasión. Creemos que cada paso que das debe reflejar tu personalidad y estilo único.</p>
                    <p>En nuestra tienda, encontrarás no solo productos, sino también una experiencia. Nos esforzamos por brindar un servicio excepcional, asegurándonos de que cada cliente se sienta valorado y satisfecho. Desde diseños clásicos hasta las últimas tendencias, tenemos algo especial para todos.</p>
                    <p>Únete a nosotros en este viaje y descubre un mundo de elegancia, comodidad y autenticidad. Estamos comprometidos a ser tu primera opción cuando se trata de calzado y accesorios de moda.</p>
                    <a href="mailto:contacto@lab.anahuac.mx" class="btn btn-primary text-uppercase">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>