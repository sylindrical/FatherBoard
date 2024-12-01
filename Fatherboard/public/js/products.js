

let productIdentifier = "product_identity";



window.addEventListener("DOMContentLoaded", function()
{
    let items = document.querySelectorAll(".ProductItem");

    items.forEach((x)=>{
        let y = parseInt((x.firstChild.textContent))+1;

        x.addEventListener("click",()=>productClick(y))
    });

}
)



function productClick(num)
{
console.log("clicked" + num);
// Simulate a mouse click:
window.location.href = "./product/" + num;
}
