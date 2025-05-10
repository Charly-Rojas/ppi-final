// Agregar al carrito con cookies

// Función para obtener el contenido de la cookie como objeto JS
function getCartFromCookie() {
    const match = document.cookie.match(/(?:^|; )carrito=([^;]*)/);
    return match ? JSON.parse(decodeURIComponent(match[1])) : {};
}

// Función para guardar el carrito en la cookie
function saveCartToCookie(cart) {
    document.cookie = "carrito=" + encodeURIComponent(JSON.stringify(cart)) + "; path=/";
}

// Función para agregar al carrito con cantidad
function addToCart(productId) {
    let cart = getCartFromCookie();
    cart[productId] = (cart[productId] || 0) + 1;
    saveCartToCookie(cart);
    alert("Producto agregado al carrito");
}