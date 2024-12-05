
let submit_btn = null;
let login_form = null;

let min_password_length = 5;

let default_regex= ".+@.+"
window.addEventListener("DOMContentLoaded", function()
{
    // submit_btn = document.getElementById("submit");
    // submit_btn.addEventListener("click", form_submit);

    login_form = document.getElementById("login_form");
    login_form.addEventListener("submit", form_submit);

})


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

function form_submit(ev)
{
    ev.preventDefault();
    let email = document.getElementById("email");
    let password = document.getElementById("password");
    let persist = document.getElementById("permanent");
    let notification_container = document.getElementById("notification_container");



    if (!(checkEmail(email.value, default_regex) || checkPassword(password.value, min_password_length)))
    {
        console.log("got both issues");
        clearBoxes();
        infoBox(notification_container,"Please check your email and make sure you password is above 5 characters in length");        
        return;
    }
    if (!checkEmail(email.value, default_regex))
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



    fd.append("permanent", persist.value);
    let token_el = document.getElementsByName("csrf-token")[0];
    let token = token_el.getAttribute("content");
    console.log(token);
    fetch("/_explicit_login", {
        method : "POST", 
        headers : {"X-CSRF-TOKEN": token}, 
        body: fd 
    }
    ).then((x)=>
x.json()).then((js)=>
{
    if (js["conn"])
    {
        window.location.href = "/home";
    }
    else
    {
        clearBoxes();
        errorBox(notification_container,"Wrong email and password combination");
    }
});
}

function checkPassword(test_password, min_length)
{
    if (password.value.length >= min_length)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}
function checkEmail(test_email, regex=".+@.+")
{
    reg = new RegExp(regex);

    return reg.test(test_email);
}