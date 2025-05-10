<?php
// index.php

# Cargar configuración
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Inicio</title>
  <!-- Head -->
  <?php require_once ROOT_DIR . '/includes/head.php' ?>
</head>

<body>
  <!-- SVG icons -->
  <?php require_once ROOT_DIR . '/includes/svg-icons.php' ?>

  <!-- Header -->
  <?php require_once ROOT_DIR . '/includes/header.php' ?>

  <!-- Hero Section -->
  <!-- <section class="discount-coupon py-2 my-2 py-md-5 my-md-5">
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
  </section> -->


  <!-- Categories Section -->
  <section class="categories py-5">
    <div class="container">
      <h2 class="text-center mb-4 h2">Explora Nuestras Categorias</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
            <div class="category-card  text-center">
            <a href="tienda?category=Sudaderas">
              <img src="images/category1.jpg" alt="Sudaderas" class="img-fluid rounded" style="aspect-ratio: 1 / 1; object-fit: cover;">
              <h3 class="mt-3 text-center">Sudaderas</h3>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="category-card  text-center">
            <a href="tienda?category=Camisetas">
              <img src="images/category2.jpg" alt="Camisetas" class="img-fluid rounded" style="aspect-ratio: 1 / 1; object-fit: cover;">
              <h3 class="mt-3 text-center">Camisetas</h3>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="category-card  text-center">
            <a href="tienda?category=Accesorios">
              <img src="images/category3.jpg" alt="Accesorios" class="img-fluid rounded" style="aspect-ratio: 1 / 1; object-fit: cover;">
              <h3 class="mt-3 text-center">Accesorios</h3>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="category-card  text-center">
            <a href="tienda?category=Calzado">
              <img src="images/category4.jpg" alt="Calzado" class="img-fluid rounded" style="aspect-ratio: 1 / 1; object-fit: cover;">
              <h3 class="mt-3 text-center">Calzado</h3>
            </a>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="category-card  text-center">
            <a href="tienda?category=Pantalones">
              <img src="images/category5.jpg" alt="Pantalones" class="img-fluid rounded" style="aspect-ratio: 1 / 1; object-fit: cover;">
              <h3 class="mt-3 text-center">Pantalones</h3>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Products Section -->
  <section id="featured-products" class="product-store">
    <div class="container-md">
      <div class="display-header d-flex align-items-center justify-content-between">
        <h2 class="section-title text-uppercase">En tendencia</h2>
      </div>
      <div class="product-content padding-small">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
          <?php
          $sql = "
                        SELECT 
                            id,
                            name,
                            price,
                            url_img as image_url
                        FROM products p
                        ORDER BY RAND()
                        LIMIT 5
                    ";

          foreach ($conn->query($sql) as $producto):
            print_product_card(
              $producto['id'],
              $producto['name'],
              $producto['price'],
              $producto['image_url']
            );

          endforeach; ?>
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