var fnameError = document.getElementById('fname-error');
var lnameError = document.getElementById('lname-error');
var emailError = document.getElementById('email-error');
var messageError = document.getElementById('message-error');
var submitError = document.getElementById("subit-error");

function validateFName(){
    var name = document.getElementById('fname').value;
    var nameInput = document.getElementById('fname');

    if (name.length == 0)
    {
        fnameError.innerHTML = '';
        return false;
    }

    if (!name.match(/^[A-Za-z]*$/)){
        fnameError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        nameInput.style.borderColor = '#CF2608';
        return false;
    }

    fnameError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    nameInput.style.borderColor = '#37C70C';
    return true;
}

function validateLName(){
    var lname = document.getElementById('lname').value;
    var lnameInput = document.getElementById('lname');

    if (lname.length == 0)
    {
        lnameError.innerHTML = '';
        return false;
    }

    if (!lname.match(/^[A-Za-z]*$/)){
        lnameError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        lnameInput.style.borderColor = '#CF2608';
        return false;
    }

    lnameError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    lnameInput.style.borderColor = '#37C70C';
    return true;
}

function validateEmail(){
    var email = document.getElementById('email').value;
    var emailInput = document.getElementById('email');

    if (email.length == 0)
    {
        emailError.innerHTML = '';
        return false;
    }

    if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        emailInput.style.borderColor = '#CF2608';
        return false;
    }

    emailError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    emailInput.style.borderColor = '#37C70C';
    return true;
}


function validateMessage() {
    var message = document.getElementById('message').value;
    var messageInput = document.getElementById('message');

    var required = 2;
    var left = required - message.length;

    if (left>0)
    {
        messageError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        messageInput.style.borderColor = '#CF2608';
        return false
    }
    messageError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    messageInput.style.borderColor = '#37C70C';
    return true;
}

function validateForm()
{
    if (!validateLName() || !validateFName() || !validateEmail() || !validateMessage())
    {
        submitError.style.display = 'block';
        submitError.style.fontWeight = 'bolder';
        submitError.style.color = '#CF2608';
        submitError.innerHTML = "Javítsd ki a hibákat!";
        setTimeout(function (){submitError.style.display = ' none '}, 3000)
        return false;
    }
}