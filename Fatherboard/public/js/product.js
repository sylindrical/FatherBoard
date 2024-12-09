
let basket_button = null;
let review_button = null;
let review_form_button = null;
let review_form = null;


window.addEventListener("DOMContentLoaded", function () {
    basket_button = document.getElementById("basket_button");
    review_form_button = document.getElementById("review_button");
    review_form = document.getElementById("review_form");


    basket_button.addEventListener("click", addToBasket);
    review_form_button.addEventListener("click", showReviewForm);
    review_form.addEventListener("submit", submitReview)
})


function addToBasket() {
    console.log("Adding to basket");

    let product_id = document.getElementById("product_id").value;
    let quantity = document.getElementById("quantity").value || 1;
    let csrf_val = document.getElementsByName("csrf-token")[0];
    let token = csrf_val.content;


    let fd = new FormData();
    fd.append("product_id", product_id);
    fd.append("quantity", quantity);

    fetch("/basket/add", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        body: fd,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                console.log("Product added to basket successfully");

            } else {
                console.error("Failed to add product to basket");
            }
        })
        .catch((error) => {
            console.error("Error adding product to basket:", error);
        });
}


function submitReview(ev) {
    ev.preventDefault()
    console.log("Adding review");

    let rating_value = document.getElementById("rating");

    let review_text = document.getElementById("review_text");

    let product_id = document.getElementsByName("product_identity")[0];

    let csrf_val = document.getElementsByName("csrf-token")[0];

    let token = csrf_val.content;



    let fd = new FormData()
    fd.append("rating", rating_value.value);
    fd.append("review", review_text.value);
    fd.append("product_id", product_id.content);

    fetch("/add/review",
        {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": token
            },
            body: fd
        }
    ).then((x) => x.json()).then((js) => {
        if (js["conn"] == true) {
            window.location.replace("/product/" + product_id.content);
        }
        else {

        }
    }).catch((err) => {

    });
}



function showReviewForm(ev) {
    console.log("Showing Review");
    const review_form = document.getElementById("review_form");


    if (review_form.style.display === "") {
        review_form.style.display = "none";
    }

    if (review_form.style.display === "none") {
        review_form.style.display = "flex";


    }
    else {
        review_form.style.display = "none";

    }
}
