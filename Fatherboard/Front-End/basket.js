document.addEventListener("DOMContentLoaded", () => {
    const emptyBasket = document.getElementById("empty-basket");
    const basketItems = document.getElementById("basket-items");
    const totalItemsEl = document.getElementById("total-items");
    const totalPriceEl = document.getElementById("total-price");

    // Dummy products
    const products = []; // No products in the basket


    // Render the basket
    function renderBasket() {
        if (products.length === 0) {
            emptyBasket.classList.remove("hidden");
            basketItems.classList.add("hidden");
        } else {
            emptyBasket.classList.add("hidden");
            basketItems.classList.remove("hidden");

            let totalItems = 0;
            let totalPrice = 0;

            products.forEach((product) => {
                totalItems += product.quantity;
                totalPrice += product.price * product.quantity;
            });

            totalItemsEl.textContent = totalItems;
            totalPriceEl.textContent = totalPrice.toFixed(2);
        }
    }

    renderBasket();
});
