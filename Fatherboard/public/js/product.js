
let basket_button = null;
let review_button = null;

window.addEventListener("DOMContentLoaded", function()
{
    basket_button = document.getElementById("basket_button");
    review_button = document.getElementById("review_button");

    basket_button.addEventListener("click", addToBasket);
    review_button.addEventListener("click", addReview);
})
function addToBasket()
{
    console.log("Adding to basket");
}

function addReview()
{
    console.log("Adding review");
}