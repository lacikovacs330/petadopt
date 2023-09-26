var usernameError = document.getElementById('username-login-error');
var lnameError = document.getElementById('lname-login-error');
var fnameError = document.getElementById('fname-login-error');
var emailError = document.getElementById('email-login-error');
var firstPasswordError = document.getElementById('first-password-login-error');
var secondPasswordError = document.getElementById('second-password-login-error');
var submitRegError = document.getElementById("subit-login-error");
var submitModifyError = document.getElementById("subit-modify-error");

function validateUserName(){
    var username = document.getElementById('userName').value;
    var usernameInput = document.getElementById('userName');

    if (username.length == 0)
    {
        usernameError.innerHTML = '';
        return false;
    }

    if (!username.match(/^[A-Za-z]*$/)){
        usernameInput.style.borderColor = '#CF2608';
        return false;
    }

    usernameInput.style.borderColor = '#37C70C';
    return true;
}

function validateFName(){
    var fname = document.getElementById('fName').value;
    var fnameInput = document.getElementById('fName');

    if (fname.length == 0)
    {
        fnameError.innerHTML = '';
        return false;
    }

    if (!fname.match(/^[A-Za-z]*$/)){
        fnameInput.style.borderColor = '#CF2608';
        return false;
    }

    fnameInput.style.borderColor = '#37C70C';
    return true;
}

function validateLName(){
    var lname = document.getElementById('lName').value;
    var lnameInput = document.getElementById('lName');

    if (lname.length == 0)
    {
        lnameError.innerHTML = '';
        return false;
    }

    if (!lname.match(/^[A-Za-z]*$/)){
        lnameInput.style.borderColor = '#CF2608';
        return false;
    }

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
        emailInput.style.borderColor = '#CF2608';
        return false;
    }

    emailInput.style.borderColor = '#37C70C';
    return true;
}


function validateFirstPassword() {
    var firstPass = document.getElementById('firstPassword').value;
    var firstPassInput = document.getElementById('firstPassword');

    if (firstPass.length == 0)
    {
        firstPasswordError.innerHTML = '';
        return false;
    }

    if (!firstPass.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)){
        firstPassInput.style.borderColor = '#CF2608';
        return false;
    }

    firstPassInput.style.borderColor = '#37C70C';
    return true;
}

function validateSecondPassword() {
    var secondPass = document.getElementById('secondPassword').value;
    var secondPassInput = document.getElementById('secondPassword');

    if (secondPass.length == 0)
    {
        firstPasswordError.innerHTML = '';
        return false;
    }

    if (!secondPass.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/)){
        secondPassInput.style.borderColor = '#CF2608';
        return false;
    }

    secondPassInput.style.borderColor = '#37C70C';
    return true;
}

function validateRegForm()
{
    if (!validateUserName || !validateLName() || !validateFName() || !validateEmail() || !validateFirstPassword() || !validateSecondPassword())
    {
        submitRegError.style.display = 'block';
        submitRegError.style.fontWeight = 'bolder';
        submitRegError.style.color = '#CF2608';
        submitRegError.innerHTML = "Javítsd ki a hibákat!";
        etTimeout(function (){submitRegError.style.display = ' none '}, 3000)
        return false;
    }
}

function validateModifyForm()
{
    if (!validateFirstPassword() || !validateSecondPassword())
    {
        submitModifyError.style.display = 'block';
        submitModifyError.innerHTML = "Jelszavának legalább 8 karakterből kell álnia, és tartalmaznia kell egy nagy, egy kis betűt és egy számot!";
        submitModifyError.style.fontWeight = 'bolder';
        submitModifyError.style.color = '#CF2608';
        setTimeout(function (){submitModifyError.style.display = ' none '}, 3000)
        return false;
    }
}