var imageErrorCat = document.getElementById('image-cat-error');
var nameErrorCat = document.getElementById('name-cat-error');
var descriptionErrorCat = document.getElementById('desc-cat-error');
var ageErrorCat = document.getElementById('age-cat-error');
var submitErrorCat = document.getElementById('subit-cat-error');

function validateImageCat(){
    var imageCat = document.getElementById('imageCat').value;
    var imageCatInput = document.getElementById('imageCat');

    if (imageCat.length == 0)
    {
        imageErrorCat.innerHTML = '';
        return false;
    }

    if (!imageCat.match(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i)){
        imageErrorCat.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        imageCatInput.style.borderColor = '#CF2608';
        return false;
    }

    imageErrorCat.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    imageCatInput.style.borderColor = '#37C70C';
    return true;
}

function validateNameCat(){
    var nameCat = document.getElementById('nameCat').value;
    var nameCatInput = document.getElementById('nameCat');

    if (nameCat.length == 0)
    {
        nameErrorCat.innerHTML = '';
        return false;
    }

    if (!nameCat.match(/^[A-Za-z]*$/)){
        nameErrorCat.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        nameCatInput.style.borderColor = '#CF2608';
        return false;
    }

    nameErrorCat.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    nameCatInput.style.borderColor = '#37C70C';
    return true;
}

function validateDescriptionCat() {
    var descriptionCat = document.getElementById('descriptionCat').value;
    var descriptionCatInput = document.getElementById('descriptionCat');

    var requiredCat = 2;
    var leftCat = requiredCat - descriptionCat.length;

    if (leftCat>0)
    {
        descriptionErrorCat.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        descriptionCatInput.style.borderColor = '#CF2608';
        return false
    }
    descriptionErrorCat.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    descriptionCatInput.style.borderColor = '#37C70C';
    return true;
}

function validateAgeCat()
{
    var ageCat = document.getElementById('ageCat').value;
    var ageCatInput = document.getElementById('ageCat');

    if (ageCat.length == 0)
    {
        ageErrorCat.innerHTML = '';
        return false;
    }

    if (ageCat >=0 && ageCat <= 15){
        ageErrorCat.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
        ageCatInput.style.borderColor = '#37C70C';
        return true;

    }

    ageErrorCat.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
    ageCatInput.style.borderColor = '#CF2608';
    return false;

}

function validateFormCat()
{
    if (!validateImageCat() || !validateNameCat() || !validateDescriptionCat() || !validateAgeCat())
    {
        submitErrorCat.style.display = 'block';
        submitErrorCat.style.fontWeight = 'bolder';
        submitErrorCat.style.color = '#CF2608';
        submitErrorCat.innerHTML = "Javítsd ki a hibákat!";
        setTimeout(function (){submitError12.style.display = ' none '}, 3000)
        return false;
    }
}