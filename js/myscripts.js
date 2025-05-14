// Agregar al carrito con cookies

// Función para obtener el contenido de la cookie como objeto JS
function getCartFromCookie() {
    const match = document.cookie.match(/(?:^|; )carrito=([^;]*)/);
    return match ? JSON.parse(decodeURIComponent(match[1])) : {};
}

function saveCartToCookie(cart) {
    document.cookie = "carrito=" + encodeURIComponent(JSON.stringify(cart)) + "; path=/";
}

document.addEventListener("click", function (e) {
    //Imprimir la cookie en la consola del carrito
    console.log("Contenido de la cookie carrito:", getCartFromCookie());


    if (e.target.closest(".quantity-left-minus, .quantity-right-plus")) {
        const button = e.target.closest("button[data-action]");
        const action = button.getAttribute("data-action");

        const container = button.closest(".mini-cart");
        const productId = container.getAttribute("data-product-id");
        const price = parseFloat(container.getAttribute("data-price"));
        const quantityInput = container.querySelector(".quantity-input");
        const subtotalDisplay = container.querySelector(".subtotal");

        let cart = getCartFromCookie();
        let currentQty = cart[productId] || 1;
        let stock = document.getElementById(productId).getAttribute("data-stock");

        if (action === "plus") {
            if (currentQty < stock) {
                currentQty++;
            } else {
                const msg = "Inventario insuficiente";
                const url = new URL(window.location);
                url.searchParams.set('message', msg);
                url.searchParams.set('type', 'error');
                window.location.href = url.toString();
            }
        } else if (action === "minus" && currentQty > 1) {
            currentQty--;
        }

        cart[productId] = currentQty;
        saveCartToCookie(cart);

        quantityInput.value = currentQty;
        subtotalDisplay.textContent = (price * currentQty).toFixed(2);
        updateCartTotal();
    }


    if (e.target.closest(".remove-from-cart")) {
        const button = e.target.closest(".remove-from-cart");
        const productId = button.getAttribute("data-product-id");
        let cart = getCartFromCookie();

        if (cart.hasOwnProperty(productId)) {
            delete cart[productId];
            saveCartToCookie(cart);

            // Eliminar del DOM
            const productDiv = button.closest(".mini-cart");
            if (productDiv) {
                productDiv.remove();
            }

            updateCartTotal();

            // Verificar si quedan productos
            if (Object.keys(cart).length === 0) {
                const cartContainer = document.getElementById("cart-container");
                if (cartContainer) {
                    cartContainer.innerHTML = `
            <div class="d-flex flex-column align-items-center justify-content-center py-5">
                <i class="fa-solid fa-cart-arrow-down fa-3x mb-3"></i>
                <p class="text-center">El carrito está vacío</p>
                <a href="${ROOT_URL}/tienda" class="btn btn-outline-gray hvr-sweep-to-right dark-sweep">
                    Comienza a agregar productos
                </a>
            </div>
        `;
                }
            }

        }
    }

});


function updateCartTotal() {
    let total = 0;

    document.querySelectorAll(".mini-cart").forEach(item => {
        const price = parseFloat(item.getAttribute("data-price"));
        const qty = parseInt(item.querySelector(".quantity-input").value);
        total += price * qty;
    });

    console.log("Total sin formatear:", total);

    // Mostrar con formato moneda MXN
    document.getElementById("total-cart").textContent = total.toFixed(2);
}


function addToCart(productId, stock, quantity = 1) {
    let cart = getCartFromCookie();
    if (cart[productId]) {
        cart[productId] = Math.min(cart[productId] + quantity, stock);
    } else {
        cart[productId] = Math.min(quantity, stock);
    }
    saveCartToCookie(cart);

    // Refrescar la página y agregar al url message=Producto agregado al carrito
    const msg = "Producto agregado al carrito";
    const url = new URL(window.location);
    url.searchParams.set('message', msg);
    window.location.href = url.toString();
}


// Detectar  un mensaje al toast
document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    const message = params.get("message");
    const type = params.get("type");
    let typeClass = "";

    if (message) {
        const toastEl = document.getElementById('liveToast');
        const toastBody = document.getElementById('toastMessage');
        

        switch (type) {
            case "error":
                typeClass = "bg-danger";
                break;
            case "success":
                typeClass = "bg-success";
                break;
            case "warning":
                typeClass = "bg-warning";
                break;
            case "info":
                typeClass = "bg-info";
                break;
            default:
                typeClass = "bg-success";
                break;
        }
        if (toastEl && typeClass) {
            toastEl.classList.add(typeClass);
        }
        if (toastBody) {
            toastBody.textContent = decodeURIComponent(message);
        }
        
        const toast = new bootstrap.Toast(toastEl, {
            delay: 5000
        });

        // Borrar de la url el mensaje
        params.delete("message");
        params.delete("type");
        window.history.replaceState({}, document.title, window.location.pathname + '?' + params.toString());

        toast.show();
    }
});

