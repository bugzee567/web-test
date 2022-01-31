function success(){
        document.getElementById("subscribe-heading").innerHTML = "<img src='img/ic_success.svg'>"
        document.getElementById("subscribe-paragraph").innerHTML = "<h1>Thanks for subscribing!</h1> <br> <p>You have successfully subscribed to our email listing.<br>Check your email for the discount code.</p>"
        document.getElementById("email-field").innerHTML = "";
        document.getElementById("TOS").innerHTML = "";
    }

function emailValidation(){
    
    var a = document.getElementById("email");
    var message = document.getElementById("message");
    var button = document.getElementById("button");
    var check = document.getElementById("check");
    var email = document.getElementById("email").value;
    var pattern = /^[^]+@[^ ]+\.[a-z]{2,3}$/;
    console.log("hi");
    document.getElementById("button").disabled = true;
    if(!email.match(pattern)) {
        a.classList.remove("valid");
        a.classList.add("invalid");
        message.innerHTML = "Please provide a valid e-mail address"
        message.style.color = "#ff0000"

        var input = document.getElementById("email");
        input.addEventListener("keyup", errorValidation);
    }

    if(!check.checked){
        message.innerHTML = "You must accept the terms and conditions"
        message.style.color = "#ff0000"
        check.addEventListener("change", () =>{
            message.innerHTML = ""
            emailValidation();
        } )
    }

    if(email.endsWith(".co")){
        message.innerHTML = "We are not accepting subscriptions from Colombia emails”"
        message.style.color = "#ff0000"
        var input = document.getElementById("email");
        input.addEventListener("keyup", errorValidation);
    }

    if(email === ""){
        message.innerHTML = "Email address is required"
        message.style.color = "#ff0000"
    }

    if(message.innerHTML == "" || message.innerHTML === ""){
        document.getElementById("button").disabled = false;
        button.addEventListener("click", success);
    }
};

function errorValidation(){
    var a = document.getElementById("email");
    var message = document.getElementById("message");
    var check = document.getElementById("check");
    var email = document.getElementById("email").value;
    var pattern = /^[^]+@[^ ]+\.[a-z]{2,3}$/;
    document.getElementById("button").disabled = true;

    if(!email.match(pattern)){
        message.innerHTML = "Please provide a valid e-mail address"
        message.style.color = "#ff0000"
        var input = document.getElementById("email");
        input.addEventListener("keyup", errorValidation);
    }else if(message.innerHTML = ""){
        document.getElementById("button").disabled = false;
    }

    if(email.match(pattern) && !check.checked){
        message.innerHTML = "You must accept the terms and conditions"
        message.style.color = "#ff0000"
    }

    if(email.endsWith(".co")){
        message.innerHTML = "We are not accepting subscriptions from Colombia emails”"
        message.style.color = "#ff0000"
        var input = document.getElementById("email");
        input.addEventListener("keyup", errorValidation);
    }

    if(message.innerHTML == "" || message.innerHTML === ""){
        document.getElementById("button").disabled = false;
    }




};