<!-- Aleatorios -->
<section id="featured-products" class="product-store">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">Los más vendidos</h2>
        </div>
        <div class="product-content padding-small">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                <?php
                $sql = "
                        SELECT 
                            p.id,
                            p.name,
                            pv.price,
                            pi.url AS image_url
                        FROM products p
                        JOIN product_variants pv ON pv.product_id = p.id
                        JOIN product_images pi ON pi.product_id = p.id AND pi.is_main = 1
                        ORDER BY RAND()
                        LIMIT 5
                    ";

                foreach ($conn->query($sql) as $producto):
                ?>
                    <div class="col mb-4">
                        <a href="<?php echo ROOT_URL ?>/producto?id=<?php echo htmlspecialchars($producto['id']); ?>">
                            <div class="product-card position-relative" style="cursor: pointer;">
                                <div class="card-img border-rounded-10" id="<?php echo htmlspecialchars($producto['id']); ?>" style="transition: background-color 0.3s;">
                                    <img src="<?php echo ROOT_URL . '/images/' . htmlspecialchars($producto['image_url']); ?>" alt="product-item" class="product-image img-fluid border-rounded-10">
                                </div>
                                <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                    <h3 class="card-title fs-6 fw-normal m-0">
                                        <a href="index.html"><?php echo htmlspecialchars($producto['name']); ?></a>
                                    </h3>
                                    <span class="card-price fw-bold">$<?php echo htmlspecialchars($producto['price']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <style>
                        .product-cdivrd:hover .card-img {
                            opacity: 0.8;
                            ;
                        }
                    </style>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>



<!-- Por fecha -->
<section id="latest-products" class="product-store">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase">Nuevos en la tienda</h2>
        </div>
        <div class="product-content padding-small">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                <?php
                $sql = "
                        SELECT 
                            p.id,
                            p.name,
                            pv.price,
                            pi.url AS image_url
                        FROM products p
                        JOIN product_variants pv ON pv.product_id = p.id
                        JOIN product_images pi ON pi.product_id = p.id AND pi.is_main = 1
                        ORDER BY timestamp DESC
                        LIMIT 5
                    ";

                foreach ($conn->query($sql) as $producto):
                ?>
                    <div class="col mb-4">
                        <a href="<?php echo ROOT_URL ?>/producto?id=<?php echo htmlspecialchars($producto['id']); ?>">
                            <div class="product-card position-relative" style="cursor: pointer;">
                                <div class="card-img border-rounded-10" id="<?php echo htmlspecialchars($producto['id']); ?>" style="transition: background-color 0.3s;">
                                    <img src="<?php echo ROOT_URL . '/images/' . htmlspecialchars($producto['image_url']); ?>" alt="product-item" class="product-image img-fluid border-rounded-10">
                                </div>
                                <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                    <h3 class="card-title fs-6 fw-normal m-0">
                                        <a href="index.html"><?php echo htmlspecialchars($producto['name']); ?></a>
                                    </h3>
                                    <span class="card-price fw-bold">$<?php echo htmlspecialchars($producto['price']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <style>
                        .product-cdivrd:hover .card-img {
                            opacity: 0.8;
                            ;
                        }
                    </style>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- Por categorías -->
<?php
// Obtener las categorías de la base de datos
$sql = "SELECT DISTINCT name FROM categories";
$categorias = [];
foreach ($conn->query($sql) as $row) {
    $categorias[] = $row['name'];
}

foreach ($categorias as $categoria):
?>
    <section id="latest-products" class="product-store">
        <div class="container-md">
            <div class="display-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase"><?php echo $categoria ?></h2>
            </div>
            <div class="product-content padding-small">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5">
                    <?php
                    $sql = "
                        SELECT 
                            p.id,
                            p.name,
                            pv.price,
                            pi.url AS image_url
                        FROM products p
                        JOIN product_variants pv ON pv.product_id = p.id
                        JOIN product_images pi ON pi.product_id = p.id AND pi.is_main = 1
                        JOIN categories c ON c.id = p.category_id
                        WHERE c.name = '$categoria'
                        ORDER BY RAND()
                        LIMIT 4
                    ";

                    foreach ($conn->query($sql) as $producto):
                    ?>
                        <div class="col mb-4">
                            <a href="<?php echo ROOT_URL ?>/producto?id=<?php echo htmlspecialchars($producto['id']); ?>">
                                <div class="product-card position-relative" style="cursor: pointer; object-fit: contain;">
                                    <div class="card-img border-rounded-10" id="<?php echo htmlspecialchars($producto['id']); ?>" style="transition: background-color 0.3s;">
                                        <img src="<?php echo ROOT_URL . '/images/' . htmlspecialchars($producto['image_url']); ?>" alt="product-item" class="product-image img-fluid border-rounded-10">
                                    </div>
                                    <div class="card-detail d-flex justify-content-between align-items-center mt-3">
                                        <h3 class="card-title fs-6 fw-normal m-0">
                                            <a href="index.html"><?php echo htmlspecialchars($producto['name']); ?></a>
                                        </h3>
                                        <span class="card-price fw-bold">$<?php echo htmlspecialchars($producto['price']); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    <div class="col mb-4 product-image">
                        <a href="<?php echo ROOT_URL ?>/categoria?name=<?php echo urlencode($categoria); ?>" class="d-flex justify-content-center align-items-center border border-rounded-10" style="height: 100%; text-decoration: none;">
                            <span class="fw-bold text-uppercase">Ver más</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-right ms-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 1 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endforeach; ?>