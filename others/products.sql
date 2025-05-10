INSERT INTO categories (id, name, description)
        VALUES (1, 'Camisetas', 'Prendas para clima frío');
INSERT INTO categories (id, name, description)
        VALUES (2, 'Sudaderas', 'Ropa superior casual');
INSERT INTO categories (id, name, description)
        VALUES (3, 'Accesorios', 'Complementos de vestimenta');
INSERT INTO categories (id, name, description)
        VALUES (4, 'Calzado', 'Calzado para todo clima');
INSERT INTO categories (id, name, description)
        VALUES (5, 'Pantalones', 'Ropa inferior casual');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (1, 'Usuario 1', 'user1@ejemplo.com', '$2y$10$UqpNS/LLlyI.7jKUz5JJn.e/TZOiq2ko0S4dfc91HRJxQLxCwSxgm', '2001-02-15', '123456789012341', '01000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (2, 'Usuario 2', 'user2@ejemplo.com', '$2y$10$HByYD09z3ufNVWJms0BDtOMSmengesOA1jPW4/g8BI9swFqu4edC2', '2002-03-15', '123456789012342', '02000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (3, 'Usuario 3', 'user3@ejemplo.com', '$2y$10$cvhyJUsA23L6sUO21O4X7.ZugPxYTFrIXw0J4gZrxiDomVIG4XSVC', '2003-04-15', '123456789012343', '03000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (4, 'Usuario 4', 'user4@ejemplo.com', '$2y$10$3n4KHdFTdeXcc3fpIm6EUuOpiaP0vWER4Om3RMMjdYxe.CsLQTdYC', '2004-05-15', '123456789012344', '04000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (5, 'Usuario 5', 'user5@ejemplo.com', '$2y$10$fbXljQnQwibnK1uQHB56BOMzB0ScU5EHU3SsjnBaf07hEELfKyzwq', '2005-06-15', '123456789012345', '05000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (6, 'Usuario 6', 'user6@ejemplo.com', '$2y$10$IrOXTqpSBxzwdci/SLWcxOOTgxHuYE2pa2sEC5jV0bypAUTK/dQlS', '2006-07-15', '123456789012346', '06000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (7, 'Usuario 7', 'user7@ejemplo.com', '$2y$10$k8B6uPkZ58AB.WTmezphgO4QExzM78TvNmXXbDcTNGE6Lqjsc9S7y', '2007-08-15', '123456789012347', '07000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (8, 'Usuario 8', 'user8@ejemplo.com', '$2y$10$P4WUEAedlvwpY.h/SkBcMOHR4OJJatzRpICYfGfiA47fTtOB2YPO.', '2008-09-15', '123456789012348', '08000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (9, 'Usuario 9', 'user9@ejemplo.com', '$2y$10$3fWN.pPUCHIFyXmQAJudyOD0.LssMlX4YRl4cWjeAhdM4713CSUIm', '2009-01-15', '123456789012349', '09000');
INSERT INTO users (id, name, mail, password, birth_date, card_number, zip_code)
        VALUES (10, 'Usuario 10', 'user10@ejemplo.com', '$2y$10$i2pKMTDaijNqp2SIyeCju.XbkI5belfkLM7wjE7hLnGgFHtEvZVZO', '2000-02-15', '1234567890123410', '010000');
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (1, 'Producto 1', 'Descripción del producto 1', 'Áurea Urbana', 'México', 5);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (2, 'Producto 2', 'Descripción del producto 2', 'Áurea Urbana', 'México', 1);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (3, 'Producto 3', 'Descripción del producto 3', 'Áurea Urbana', 'México', 2);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (4, 'Producto 4', 'Descripción del producto 4', 'Áurea Urbana', 'México', 4);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (5, 'Producto 5', 'Descripción del producto 5', 'Áurea Urbana', 'México', 1);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (6, 'Producto 6', 'Descripción del producto 6', 'Áurea Urbana', 'México', 2);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (7, 'Producto 7', 'Descripción del producto 7', 'Áurea Urbana', 'México', 2);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (8, 'Producto 8', 'Descripción del producto 8', 'Áurea Urbana', 'México', 1);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (9, 'Producto 9', 'Descripción del producto 9', 'Áurea Urbana', 'México', 3);
INSERT INTO products (id, name, description, manufacturer, origin, category_id)
        VALUES (10, 'Producto 10', 'Descripción del producto 10', 'Áurea Urbana', 'México', 1);
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (1, 1, 'S', 451, 5, 'SKU0001');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (2, 2, 'XL', 777, 10, 'SKU0002');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (3, 3, 'M', 546, 16, 'SKU0003');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (4, 4, 'L', 427, 11, 'SKU0004');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (5, 5, 'M', 507, 19, 'SKU0005');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (6, 6, 'M', 496, 7, 'SKU0006');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (7, 7, 'XL', 510, 10, 'SKU0007');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (8, 8, 'S', 477, 6, 'SKU0008');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (9, 9, 'M', 463, 10, 'SKU0009');
INSERT INTO product_variants (id, product_id, size, price, stock, sku)
        VALUES (10, 10, 'L', 445, 11, 'SKU0010');
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (1, 1, 'producto_1.jpg', 0);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (2, 2, 'producto_2.jpg', 1);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (3, 3, 'producto_3.jpg', 0);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (4, 4, 'producto_4.jpg', 1);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (5, 5, 'producto_5.jpg', 0);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (6, 6, 'producto_6.jpg', 1);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (7, 7, 'producto_7.jpg', 0);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (8, 8, 'producto_8.jpg', 1);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (9, 9, 'producto_9.jpg', 0);
INSERT INTO product_images (id, product_id, url, is_main)
        VALUES (10, 10, 'producto_10.jpg', 1);
INSERT INTO orders (id, user_id, total_price, status, created_at)
        VALUES (1, 9, 1147, 'pendiente', '2025-04-29 21:07:35.757094');
INSERT INTO orders (id, user_id, total_price, status, created_at)
        VALUES (2, 3, 1086, 'pendiente', '2025-04-17 21:07:35.757101');
INSERT INTO order_items (id, order_id, product_variant_id, quantity, price)
        VALUES (1, 1, 8, 2, 306);
INSERT INTO order_items (id, order_id, product_variant_id, quantity, price)
        VALUES (2, 2, 4, 1, 619);