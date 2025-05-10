<!-- Obtener la categoría del GET -->
<?php
$category = $_GET['category'];

// Consultar a la base de datos el id de la categoría
$sql = "SELECT id FROM categories WHERE name = '$category'";
$res = $conn->query($sql);
if ($res && $res->num_rows === 1) {
    $row = $res->fetch_assoc();
    $category_id = $row['id'];
} else {
    // Si no existe la categoría, redirigir a la página principal
    header("Location: " . ROOT_URL . "/tienda");
    exit();
}

?>

<section id="featured-products" class="product-store">
    <div class="container-md">
        <div class="display-header d-flex align-items-center justify-content-between">
            <h2 class="section-title text-uppercase"><?php echo $category ?></h2>
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
                        WHERE category_id = '$category_id'
                    ";
                foreach ($conn->query($sql) as $producto):
                    print_product_card(
                        $producto['id'],
                        $producto['name'],
                        $producto['price'],
                        $producto['image_url']
                    );

                endforeach;
            ?>
            </div>

        </div>
    </div>
</section>