

let address_button = null;
let personal_button = null;
let billing_button = null;
let history_button = null

window.addEventListener("DOMContentLoaded",()=>
{
address_button = document.getElementById("button_address");
billing_button = document.getElementById("button_billing");
personal_button = document.getElementById("button_personal");
history_button = document.getElementById("button_history");


address_button.addEventListener("click", addressClicked);
billing_button.addEventListener("click",billingClicked);
history_button.addEventListener("click", historyClicked);
personal_button.addEventListener("click",personalClicked);


});

class AddressElement extends HTMLElement
{
    constructor()
    {
        super();
        this.attachShadow({mode:"open"});

        let addressTemplate = document.getElementById("address-template");

        let content = addressTemplate.content;
        console.log(content);
        this.shadowRoot.append(content.cloneNode(true));
    }
}


class PersonalElement extends HTMLElement
{
    constructor()
    {
        super();
        this.attachShadow({mode:"open"});

        let personalTemplate = document.getElementById("personal-template");

        this.shadowRoot.append(personalTemplate.content.cloneNode(true));
    }
}

customElements.define(
    "personal-element",
    PersonalElement
)

customElements.define(
    "address-element",
    AddressElement
)

function addressClicked()
{
    console.log("Address clicked");

    let csrf = document.getElementsByName("csrf-token")[0];
    let csrf_val = csrf.getAttribute("content");
    fetch("./get/address", {method: "POST", headers : {"X-CSRF-TOKEN": csrf_val}}).then((x)=>x.json()).then((y)=>
        {
            console.log(y);
            showAddress(y)
});

}

function billingClicked()
{
    console.log("Billing clicked");

}
function historyClicked()
{
    console.log("History clicked");

}
function personalClicked()
{
    console.log("Address clicked");

    let csrf = document.getElementsByName("csrf-token")[0];
    let csrf_val = csrf.getAttribute("content");
    let info = null;
    fetch("./get/personal", {method: "POST", headers : {"X-CSRF-TOKEN": csrf_val}}).then((x)=>x.json()).then(
        (y)=>{
            console.log(y);
            showPersonal(y);
        }
    );
}

function showAddress(info)
{
    let option_information = document.getElementById("option-information");

    option_information.innerHTML = "";


    if (info.length != 0)
    {

    for (let elem of info)
    {
    let address_element = document.createElement("address-element");

    let country_text = document.createElement("span")
    country_text.setAttribute("slot","Country");
    country_text.textContent = elem["Country"];

    let city_text = document.createElement("span")
    city_text.setAttribute("slot","City");
    city_text.textContent = elem["City"];

    let address_text = document.createElement("span")
    address_text.setAttribute("slot","AddressLine");
    address_text.textContent = elem["Address Line"];


    address_element.appendChild(country_text);
    address_element.appendChild(city_text);
    address_element.appendChild(address_text);

    
    option_information.append(address_element);

    }
}
    else
    {

        let address_title = document.createElement("h3");
        address_title.textContent = "Address Information";


        let info_elem = document.createElement("p");
        info_elem.textContent = "You do not have an address currently.";

        option_information.append(address_title);
        option_information.append(info_elem);

    }
}




function showPersonal(info)
{

    let personal_element = document.createElement("personal-element");

    let username_text = document.createElement("span");
    username_text.setAttribute("slot","Username");
    username_text.textContent = info["Username"];


    let password_text = document.createElement("span");
    password_text.setAttribute("slot","Password");
    password_text.textContent = info["Password"];

    personal_element.append(username_text)
    personal_element.append(password_text);

    let option_information = document.getElementById("option-information");

    option_information.innerHTML = personal_element.outerHTML;

}