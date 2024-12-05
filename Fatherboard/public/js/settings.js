

let address_button = null;
let personal_button = null;
let billing_button = null;
let history_button = null
let show_add_address_button  = null;
let add_address_submit =null;

let csrf =null;
let csrf_val =null;


window.addEventListener("DOMContentLoaded",()=>
{
address_button = document.getElementById("button_address");
billing_button = document.getElementById("button_billing");
personal_button = document.getElementById("button_personal");
history_button = document.getElementById("button_history");
show_add_address_button = document.getElementById("button_show_address_gui");
csrf = document.getElementsByName("csrf-token")[0];
csrf_val =  csrf.getAttribute("content");


address_button.addEventListener("click", addressClicked);
billing_button.addEventListener("click",billingClicked);
history_button.addEventListener("click", historyClicked);
personal_button.addEventListener("click",personalClicked)

show_add_address_button.addEventListener("click", toggleAddAddress);

document.getElementById("button_show_address_gui");;

let addrElements = document.querySelectorAll("address-element")
for (let elem of addrElements)
{
    console.log(elem.shadowRoot);
    let button = elem.shadowRoot.querySelector("[name=remove-item]")
    button.addEventListener("click",removeAddress);
}

add_address_form.addEventListener("click",(e)=>
{
e.preventDefault();
})


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

    option_information.innerHTML = `<h3>Address Information</h3>
     <button id='button_show_address_gui'>Add Address</button>`;



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

    let id_text = document.createElement("p");
    id_text.setAttribute("hidden", "");
    id_text.setAttribute("value", elem["id"]);
    id_text.setAttribute("name","address_id");

    address_element.appendChild(country_text);
    address_element.appendChild(city_text);
    address_element.appendChild(address_text);
    address_element.appendChild(id_text);
    
    option_information.append(address_element);
    show_add_address_button = document.getElementById("button_show_address_gui");
    show_add_address_button.addEventListener("click",toggleAddAddress);

    console.log(address_element.shadowRoot);
    let remove_button = address_element.shadowRoot.querySelector("[name=remove-item]");
    
    remove_button.addEventListener("click",removeAddress);
    }
}
    else
    {




        let info_elem = document.createElement("p");
        info_elem.textContent = "You do not have an address currently.";

        option_information.append(info_elem);
        option_information.querySelector("#button_show_address_gui").addEventListener("click",toggleAddAddress);

    }
}




function showPersonal(info)
{

    let personal_element = document.createElement("personal-element");

    let email_text = document.createElement("span");
    email_text.setAttribute("slot","Email");
    email_text.textContent = info["Email"];


    let password_text = document.createElement("span");
    password_text.setAttribute("slot","Password");
    password_text.textContent = info["Password"];

    personal_element.append(email_text)
    personal_element.append(password_text);

    let option_information = document.getElementById("option-information");

    option_information.innerHTML = personal_element.outerHTML;

}

function toggleAddAddress()
{
    let address_box = document.getElementById("add_address_box")
    console.log("y")
    if (address_box.hasAttribute("hidden"))
    {
        address_box.removeAttribute("hidden");

    }
    else
    {
        address_box.setAttribute("hidden", "");
    }
    address_submit = document.getElementById("add_address_submit");

    address_submit.addEventListener("click",addAddress);

}

function removeAddress(ev)
{
    console.log("susan");
    console.log(ev.target.getRootNode().host.querySelector("[name=address_id]").getAttribute("value"));

    addr_value = ev.target.getRootNode().host.querySelector("[name=address_id]").getAttribute("value")
    fetch("/delete/address",
        {
            method: "POST",
            headers : {
                "Content-Type" : "application/json",
                "X-CSRF-TOKEN" : csrf_val
            },
            body : JSON.stringify({"address_id" : addr_value})
        }
    ).then((x)=>
        {if (!x.ok)
        {
            throw new Error("issue bos")
        }
        window.location.replace("/settings");
    }
    ).catch(x=>{
        throw new Error("darn it")
});

} 

// function addAddress()
// {
//     let country = document.getElementById("inp_country");
//     let city = document.getElementById("inp_city");
//     let addrline = document.getElementById("inp_addrLine");

//     fetch("/add/address", {method:"POST", headers: {"X-CSRF-TOKEN" : csrf_val}, body : JSON.stringify({country : country, city: city, addressLine:addrline})}).then((x)=>x.json()).then(
//         (js)=>{
//             console.log(js)
//         }
//     );
// }

function addAddress() {
    let country = document.getElementById("inp_country").value;
    let city = document.getElementById("inp_city").value;
    let addrline = document.getElementById("inp_addrLine").value;

    let postCode = document.getElementById("inp_postCode")?.value ? document.getElementById("inp_postCode").value : "None"
    console.log(postCode);
    
    console.log("yippe")

    let form_data = new FormData();

    form_data.append("Country", country);
    form_data.append("City", city);
    form_data.append("AddressLine", addrline);
    form_data.append("PostCode", postCode);

    console.log(form_data);

    fetch("/add/address", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf_val
        },
        // body: JSON.stringify({ country: country, city: city, addressLine: addrline })
        body: form_data
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        toggleAddAddress();
        
        return response.json();
    })
    .then(js => {
        console.log(js);
        window.location.replace("/settings");

    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}