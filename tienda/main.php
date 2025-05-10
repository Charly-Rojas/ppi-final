<!-- Aleatorios -->
<h1 class="text-center mt-5 mb-5 pb-5 text-uppercase">Bienvenido a la tienda de Áurea Urbana</h1>
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
                            id,
                            name,
                            price,
                            url_img as image_url
                        FROM products p
                        ORDER BY created_at DESC
                        LIMIT 5
                    ";

                foreach ($conn->query($sql) as $producto):
                    print_product_card(
                        $producto['id'],
                        $producto['name'],
                        $producto['price'],
                        $producto['image_url']
                    );
                ?>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</section>

<!-- Por categorías -->
<?php
// Obtener las categorías de la base de datos
$sql = "SELECT id, name FROM categories";
$categorias = [];
foreach ($conn->query($sql) as $row) {
    $categorias[] = [
        'id' => $row['id'],
        'name' => $row['name']
    ];
}


foreach ($categorias as $categoria):
?>
    <section id="latest-products" class="product-store">
        <div class="container-md">
            <div class="display-header d-flex align-items-center justify-content-between">
                <h2 class="section-title text-uppercase"><?php echo $categoria['name']; ?></h2>
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
                            WHERE category_id = " . $categoria['id'] . "
                        ORDER BY RAND()
                        LIMIT 4;
                    ";
                    // echo $sql;
                    if ($conn->query($sql) === false) {
                        echo "Error: " . $conn->error;
                    } else {
                        $result = $conn->query($sql);
                    }

                    // Mostrar los productos de la categoría
                    foreach ($result as $producto):
                        print_product_card(
                            $producto['id'],
                            $producto['name'],
                            $producto['price'],
                            $producto['image_url']
                        );
                    endforeach; ?>
                    <div class="col mb-4 product-image">
                        <a href="<?php echo ROOT_URL ?>/categoria?name=<?php echo urlencode($categoria["name"]); ?>" class="d-flex justify-content-center align-items-center border border-rounded-10 p-4" style="height: 100%; text-decoration: none;">
                            <span class="fw-bold text-uppercase">Ver más</span>
                            <i class="fa-solid fa-arrow-right-long ms-2"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endforeach; ?>