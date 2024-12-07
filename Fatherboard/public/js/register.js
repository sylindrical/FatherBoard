let register_form = null;
let csrf_val = null;

let min_password_length = 5;

let default_regex = ".+@.+"
window.addEventListener("DOMContentLoaded", function()
{


    register_form = document.getElementById("register_form");
    register_form.addEventListener("submit", form_submit);
    let csrf_token =  document.getElementsByName("csrf-token")[0];
    csrf_val = csrf_token.getAttribute("content");

})


function form_submit(ev)
{  
    ev.preventDefault();
    console.log("registering");
    let email = document.getElementById("username");
    let password = document.getElementById("password");

    let first_name = document.getElementById("first_name");
    let last_name = document.getElementById("last_name");


    let notification_container = document.getElementById("notification_container");

    if (!(checkEmail(email.value,default_regex) || checkPassword(password.value,min_password_length)))
        {
            console.log("got both issues");
            clearBoxes();
            infoBox(notification_container,"Please check your email and make sure you password is above 5 characters in length");        
            return;
        }
        if (!checkEmail(email.value,default_regex))
        {
            console.log("only email");
            clearBoxes();
    
            infoBox(notification_container, "Please ensure that the email follows proper email format")
            return;
        }
        if (!checkPassword(password.value, min_password_length))
        {
            console.log("only password");
            clearBoxes();
    
            infoBox(notification_container, "Please ensure that the password is more than 5 characters")
    
            return;
    
        }

    let fd = new FormData();
    fd.append("email", email.value);
    fd.append("password", password.value);
    fd.append("firstName",first_name.value);
    fd.append("lastName",last_name.value);


    fetch("/_explicit_register", {
        method: "POST",
        headers :
        {
            "X-CSRF-TOKEN" : csrf_val
        },
        body : fd
    }).then((x)=>x.json()).then((js)=>
        {
            console.log(js)
            if (js["conn"] == true)
            {
            window.location.href= "/login";
            }
            else
            {
                clearBoxes();
                errorBox(notification_container, js["reason"]);
            }
});
}


function checkPassword(test_password, length)
{
    if (password.value.length >= length)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}
function checkEmail(test_email,def_regex=default_regex)
{
    reg = new RegExp(def_regex);
    return reg.test(test_email);
}


function clearBoxes()
{
    let notification_box = document.getElementsByClassName("notification");
    console.log(notification_box);

    // for (let elem of notification_box)
    // {
    //     console.log(5);
    //     elem.outerHTML = "";
    // }
    [...notification_box].forEach((x)=>
{
    x.outerHTML = "";
});
}

function errorBox(container,string)
{
    let text_error_box = `<div id="error_box" class="notification">
        <p>${string}</p>
    </div>`;

    container.innerHTML += text_error_box;
}

function infoBox(container, string)
{
    let text_info_box = `   <div id="info_box" class="notification">
        <p>${string}</p>
    </div>`;
    container.innerHTML += text_info_box;

}