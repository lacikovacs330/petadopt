var lastnameAdoptError = document.getElementById('lastname-adopt-error');
var firstnameAdoptError = document.getElementById('firstname-adopt-error');
var emailAdoptError = document.getElementById('email-adopt-error');
var addressAdoptError = document.getElementById('address-adopt-error');
var submitAdoptError = document.getElementById('subit-adopt-error');

function validateLName6(){
    var lastnameAdopt = document.getElementById('lastnameAdopt').value;
    var lastnameAdoptInput = document.getElementById('lastnameAdopt');

    if (lastnameAdopt.length == 0)
    {
        lastnameAdoptError.innerHTML = '';
        return false;
    }

    if (!lastnameAdopt.match(/^[A-Za-z]*$/)){
        lastnameAdoptError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        lastnameAdoptInput.style.borderColor = '#CF2608';
        return false;
    }
        lastnameAdoptError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
        lastnameAdoptInput.style.borderColor = '#37C70C';
        return true;

}

function validateFName6(){
    var firstnameAdopt = document.getElementById('firstnameAdopt').value;
    var firstnameAdoptInput = document.getElementById('firstnameAdopt');

    if (firstnameAdopt.length == 0)
    {
        firstnameAdoptError.innerHTML = '';
        return false;
    }

    if (!firstnameAdopt.match(/^[A-Za-z]*$/)){
        firstnameAdoptError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        firstnameAdoptInput.style.borderColor = '#CF2608';
        return false;
    }
    firstnameAdoptError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    firstnameAdoptInput.style.borderColor = '#37C70C';
    return true;
}

function validateEmail6(){
    var emailAdopt = document.getElementById('emailAdopt').value;
    var emailAdoptInput = document.getElementById('emailAdopt');

    if (emailAdopt.length == 0)
    {
        emailAdoptError.innerHTML = '';
        return false;
    }

    if (!emailAdopt.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
        emailAdoptError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        emailAdoptInput.style.borderColor = '#CF2608';
        return false;
    }

    emailAdoptError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    emailAdoptInput.style.borderColor = '#37C70C';
    return true;
}

function  validateAddress6(){
    var addressAdopt = document.getElementById('addressAdopt').value;
    var addressAdoptInput = document.getElementById('addressAdopt');

    if (addressAdopt.length == 0)
    {
        addressAdoptError.innerHTML = '';
        return false;
    }

    if (!addressAdopt.match(/^[a-zA-Z0-9\s,.'-]{3,}$/)){
        addressAdoptError.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        addressAdoptInput.style.borderColor = '#CF2608';
        return false;
    }

    addressAdoptError.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    addressAdoptInput.style.borderColor = '#37C70C';
    return true;
}

function validateForm6()
{
    if (!validateLName6() || !validateFName6() || !validateEmail6() || !validateAddress6())
    {
        submitAdoptError.style.display = 'block';
        submitAdoptError.style.fontWeight = 'bolder';
        submitAdoptError.style.color = '#CF2608';
        submitAdoptError.innerHTML = "Javítsd ki a hibákat!";
        setTimeout(function (){submitAdoptError.style.display = ' none '}, 3000)
        return false;
    }
}