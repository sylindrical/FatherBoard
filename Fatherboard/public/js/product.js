
let basket_button = null;
let review_button = null;
let review_form_button = null;
let review_form = null;

window.addEventListener("DOMContentLoaded", function()
{
    basket_button = document.getElementById("basket_button");
    review_form_button = document.getElementById("review_button");
    review_form = document.getElementById("review_form");

    basket_button.addEventListener("click", addToBasket);
    review_form_button.addEventListener("click", showReviewForm);
})
function addToBasket()
{
    console.log("Adding to basket");
}

function addReview()
{
    console.log("Adding review");
}

function showReviewForm(ev)
{
    console.log("Showing Review");
    const review_form = document.getElementById("review_form");

    if (review_form.style.display != "none")
    {
        review_form.style.display = "none";

    }
    else
    {
        review_form.style.display = "flex";

    }
}