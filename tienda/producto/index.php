<?php
// index.php

# Cargar configuración
require_once '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda</title>
    <!-- Head -->
    <?php require_once ROOT_DIR . '/includes/head.php' ?>
</head>

<body>
    <!-- SVG icons -->
    <?php require_once ROOT_DIR . '/includes/svg-icons.php' ?>

    <!-- Header -->
    <?php require_once ROOT_DIR . '/includes/header.php' ?>


    <!-- Tienda  en inicio-->
    <div class="container-md">
        <?php
        //Si no hay id en GET, mostrar 404
        if (!isset($_GET['id'])) {
            require_once ROOT_DIR . '/includes/404.php';
            exit();
        }
        // COnsultar en la base de datos si el producto existe, sino existe, mostrar 404
        $id = $_GET['id'];
        $sql = "SELECT *, products.id as id, products.name as name, categories.name as cat_name FROM products, categories WHERE products.id = $id AND products.category_id = categories.id; ";
        // echo $sql;
        // echo "<br>";
        $res = $conn->query($sql);
        if ($res && $res->num_rows === 1) {
            $producto = $res->fetch_assoc();
        } else {

            require_once ROOT_DIR . '/includes/404.php';
            exit();
        }

        // print_r($producto);
        ?>

        <div class="row mt-4">
            <div class="col-md-4">
                <img src="<?php echo ROOT_URL . "/images/" . htmlspecialchars($producto['url_img']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($producto['name']); ?>" style="max-width: 100%; height: auto; max-height: 500px;">
            </div>
            <div class="col-md-8">
                <h1><?php echo htmlspecialchars($producto['name']); ?></h1>
                <p class="text-muted">Fabricante: <?php echo htmlspecialchars($producto['manufacturer']); ?></p>
                <p class="text-muted">Origen: <?php echo htmlspecialchars($producto['origin']); ?></p>
                <p class="text-muted">Categoría: <?php echo htmlspecialchars($producto['cat_name']); ?></p>
                <h3 class="text-success">$<?php echo number_format($producto['price'], 2); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($producto['description'])); ?></p>
                <div class="form-group">
                    <label for="cantidad">Stock: <?php echo $producto['stock']?></label>
                    <!-- <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" max="<?php echo (int)$producto['stock']; ?>" value="1" required> -->
                </div>
                <input type="hidden" name="product_id" value="<?php echo (int)$producto['id']; ?>">
                <button
                    type="button"
                    class="btn btn-primary mt-3"
                    onclick="addToCart(
                    <?php echo $producto['id']; ?>,
                    <?php echo $producto['stock']; ?>
                )"> 
                    Agregar al carrito
                </button>
                <!-- <button type="button" class="btn btn-primary mt-3" onclick="addToCart(<?php echo $producto['id']; ?>, <?php echo $producto['stock']; ?>, document.getElementById('cantidad').value)">Agregar al carrito</button> -->
            </div>
        </div>

    </div>



    <!-- Footer -->
    <?php require_once ROOT_DIR . '/includes/footer.php' ?>

    <!-- JavaScript -->
    <?php require_once ROOT_DIR . '/includes/scripts.php' ?>
</body>

</html>