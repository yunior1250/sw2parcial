document.addEventListener("DOMContentLoaded", function () {
    const categoriaSelect = document.getElementById("categoriaSelect");
    const productList = document.getElementById("productList");

    categoriaSelect.addEventListener("change", function () {
        const selectedCategoria = categoriaSelect.value;

        // Mostrar todos los productos si se selecciona "Todas las categorías"
        if (selectedCategoria === "todas") {
            productList.querySelectorAll(".product").forEach(function (product) {
                product.style.display = "block";
            });
            return;
        }

        // Ocultar todos los productos y mostrar solo los de la categoría seleccionada
        productList.querySelectorAll(".product").forEach(function (product) {
            const productCategoria = product.getAttribute("data-categoria");
            if (productCategoria === selectedCategoria) {
                product.style.display = "block";
            } else {
                product.style.display = "none";
            }
        });
    });


    const addToCartButtons = document.querySelectorAll(".add-to-cart");
    const cartList = document.getElementById("cartList");
    const cartTotal = document.getElementById("cartTotal");

    let cartItems = []; // Almacena los productos en el carrito

    // Función para actualizar el carrito
    function updateCart() {
        // Limpia la lista de carrito
        cartList.innerHTML = "";
        let total = 0;

        cartItems.forEach(item => {
            //const product = getProductById(item.id);

            const cartItem = document.createElement("li");
            cartItem.innerHTML = `
                <img src="${item.url}" alt="${item.nombre}">
                <h3>${item.nombre}</h3>
                <p>Precio: ${item.precio} Bs</p>
                <p>Cantidad: ${item.cantidad}</p>
            `;
            cartList.appendChild(cartItem);
            total += item.precio * item.cantidad;
        });

        cartTotal.textContent = total.toFixed(2);
    }



    // Agregar productos al carrito cuando se hace clic en el botón "Agregar al Carrito"
    addToCartButtons.forEach(button => {
        button.addEventListener("click", function () {
            const productData = JSON.parse(button.getAttribute("data-producto"));
            const productId = productData.id;
            const productName = productData.Nombre;
            const productUrl = productData.Url;
            const productPrice = productData.Precio;      
            const productStock = productData.Stock;      

            const quantityInput = button.parentElement.querySelector(".quantity-input");
            const quantity = parseInt(quantityInput.value, 10);

            if (quantity > 0 && quantity <= productStock) {
                const existingItem = cartItems.find(item => item.id === productId);
                if (existingItem) {
                    existingItem.cantidad += quantity;
                } else {
                    cartItems.push({
                        id: productId,
                        nombre: productName,
                        url: productUrl,
                        precio: productPrice,
                        cantidad: quantity,
                    });
                }

                updateCart();
            }
        });
    });


});

