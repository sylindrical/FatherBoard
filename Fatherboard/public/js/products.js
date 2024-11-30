

let productIdentifier = "product_identity";



window.addEventListener("load", function()
{
    let items = document.querySelectorAll(".ProductItem");

    this.setTimeout(()=> {  
    items.forEach((x)=>{
        let y = parseInt((x.firstChild.textContent))+1;

        x.addEventListener("click",()=>productClick(y))
    })


},2000)
}
)



function productClick(num)
{
console.log("clicked" + num);
// Simulate a mouse click:
window.location.href = "./product/" + num;
}
