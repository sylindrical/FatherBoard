

let productIdentifier = "product_identity";


let button_filter = null;

let menu_product_type = null;



class ProductElement extends HTMLElement
{
    constructor()
    {
        super();
        this.attachShadow({mode : "open"});
        let template_product  = document.getElementById("template_product");

        this.shadowRoot.append(template_product.content.cloneNode(true));

    }
}

customElements.define(
    "product-element",
    ProductElement
)


window.addEventListener("DOMContentLoaded", function()
{
    button_filter = document.getElementById("filter-button");
    menu_product_type = document.getElementById("product_type");




    
    button_filter.addEventListener("click",change);
addLinks();

}
)

function addLinks()
{
    let items = document.querySelectorAll(".ProductItem");

    items.forEach((x)=>{
        let y = parseInt((x.children[0].textContent));

        x.addEventListener("click",()=>productClick(y))
    });
}


function filterClick(cat, pri)
{
    // let type = menu_product_type.value;
    let csrf = document.getElementsByName("csrf-token");

    let csrf_token = csrf[0].getAttribute("content");

    console.log("here is pri:" + pri);
    console.log("here is cat:" + cat);
    fetch("/products", {method : "POST", headers :{
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN" : csrf_token} ,body : JSON.stringify(
                      {category : cat, price: pri })
                    }).then((x)=>x.json()).then((dec)=>
                    {
                        console.log(dec);
                        showProduct(dec);
                    })
}


function showProduct(info)
{
    let product_container = document.getElementById("ProductContainer");

    product_container.innerHTML = "";

    if (info.length != 0)
    {

    for (let elem of info)
    {
    let product_element = document.createElement("product-element");
    product_element.setAttribute("class","ProductItem")


    let id_text = document.createElement("p")
    id_text.hidden = true;
    id_text.textContent = elem["id"]

    let title_text = document.createElement("span")
    title_text.setAttribute("slot","Title");
    title_text.textContent = elem["Title"];

    let description_text = document.createElement("span")
    description_text.setAttribute("slot","Description");
    description_text.textContent = elem["Description"];

    let manufacturer_text = document.createElement("span")
    manufacturer_text.setAttribute("slot","Manufacturer");
    manufacturer_text.textContent = elem["Manufacturer"];

    product_element.appendChild(id_text);

    product_element.appendChild(title_text);
    product_element.appendChild(description_text);
    product_element.appendChild(manufacturer_text);

    
    product_container.append(product_element);

    }
}
    else
    {

        let info_title = document.createElement("h3");
        info_title.textContent = "Product Information";


        let info_elem = document.createElement("p");
        info_elem.textContent = "You do not have an address currently.";

        product_container.append(info_title);
        product_container.append(info_elem);

    }
    addLinks()



}
function productClick(num)
{
console.log("clicked" + num);
// Simulate a mouse click:
window.location.href = "./product/" + num;
}

//

function priceConvert(inequality)
{
    if (inequality.includes("+"))
    {
        divided = inequality.split("+")
        return [">= "+ divided[0]];
    }
    divided = inequality.split("-")
    if (divided.length == 2)
    {
    newStr = [">= " + divided[0], "<= " +divided[1]];
    
    return newStr;
    }
    console.log(inequality)

}

function priceConvertAll(inequality)
{
    newArr = [];

    inequality.forEach(x=>{
        newArr.push(priceConvert(x));
    })
    return newArr;
}
function change() { // https://stackoverflow.com/a/48316156
    var categoryCheckbox = document.querySelectorAll(".categories input[type='checkbox']");
    var priceCheckbox = document.querySelectorAll(".prices input[type='checkbox']");
    var filters = {
      categories: getClassOfCheckedCheckboxes(categoryCheckbox),
      prices: getClassOfCheckedCheckboxes(priceCheckbox)
    };


    filterClick(filters["categories"], priceConvertAll(filters["prices"]));
  }
  
  function getClassOfCheckedCheckboxes(checkboxes) {
    var classes = [];
  
    if (checkboxes && checkboxes.length > 0) {
      for (var i = 0; i < checkboxes.length; i++) {
        var cb = checkboxes[i];
  
        if (cb.checked) {
          classes.push(cb.getAttribute("rel"));
        }
      }
    }
  
    return classes;
  }
  
  function filterResults(filters) {
    var rElems = document.querySelectorAll(".result div");
    var hiddenElems = [];
  
    if (!rElems || rElems.length <= 0) {
      return;
    }
  
    for (var i = 0; i < rElems.length; i++) {
      var el = rElems[i];
  
      if (filters.categories.length > 0) {
        var isHidden = true;
  
        for (var j = 0; j < filters.categories.length; j++) {
          var filter = filters.categories[j];
  
          if (el.classList.contains(filter)) {
            isHidden = false;
            break;
          }
        }
  
        if (isHidden) {
          hiddenElems.push(el);
        }
      }
  
      if (filters.prices.length > 0) {
        var isHidden = true;
  
        for (var j = 0; j < filters.prices.length; j++) {
          var filter = filters.prices[j];
  
          if (el.classList.contains(filter)) {
            isHidden = false;
            break;
          }
        }
  
        if (isHidden) {
          hiddenElems.push(el);
        }
      }
    }
  
    for (var i = 0; i < rElems.length; i++) {
      rElems[i].style.display = "block";
    }
  
    if (hiddenElems.length <= 0) {
      return;
    }
  
    for (var i = 0; i < hiddenElems.length; i++) {
      hiddenElems[i].style.display = "none";
    }
  }
