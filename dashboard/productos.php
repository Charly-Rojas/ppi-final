<body>
    <h1>Lista de Productos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para obtener los productos
            $sql = "SELECT id, name, description, price, stock FROM products WHERE is_active = 1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['price']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['stock']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No hay productos disponibles</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>


    <h2>Agregar Nuevo Producto</h2>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="description">Descripción:</label>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="manufacturer">Fabricante:</label>
        <input type="text" id="manufacturer" name="manufacturer" required><br><br>

        <label for="origin">Origen:</label>
        <input type="text" id="origin" name="origin" required><br><br>

        <label for="category_id">Categoría:</label>
        <input type="number" id="category_id" name="category_id" required><br><br>

        <label for="url_img">URL de la Imagen:</label>
        <input type="text" id="url_img" name="url_img" required><br><br>

        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" step="0.01" required><br><br>

        <label for="stock">Cantidad:</label>
        <input type="number" id="stock" name="stock" required><br><br>

        <button type="submit">Agregar Producto</button>
    </form>
</body>