var imageErrorDog = document.getElementById('image-dog-error');
var nameErrorDog = document.getElementById('name-dog-error');
var descriptionErrorDog = document.getElementById('description-dog-error');
var ageErrorDog = document.getElementById('age-dog-error');
var submitErrorDog = document.getElementById('subit-dog-error');

function validateImage(){
    var imageDog = document.getElementById('image').value;
    var imageDogInput = document.getElementById('image');

    if (imageDog.length == 0)
    {
        imageErrorDog.innerHTML = '';
        return false;
    }

    if (!imageDog.match(/\.(gif|jpe?g|tiff?|png|webp|bmp)$/i)){
        imageErrorDog.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        imageDogInput.style.borderColor = '#CF2608';
        return false;
    }

    imageErrorDog.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    imageDogInput.style.borderColor = '#37C70C';
    return true;
}

function validateName(){
    var nameDog = document.getElementById('name').value;
    var nameDogInput = document.getElementById('name');

    if (nameDog.length == 0)
    {
        nameErrorDog.innerHTML = '';
        return false;
    }

    if (!nameDog.match(/^[A-Za-z]*$/)){
        nameErrorDog.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        nameDogInput.style.borderColor = '#CF2608';
        return false;
    }

    nameErrorDog.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    nameDogInput.style.borderColor = '#37C70C';
    return true;
}

function validateDescription() {
    var descriptionDog = document.getElementById('description').value;
    var descriptionDogInput = document.getElementById('description');

    var required = 2;
    var left = required - descriptionDog.length;

    if (left>0)
    {
        descriptionErrorDog.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
        descriptionDogInput.style.borderColor = '#CF2608';
        return false
    }
    descriptionErrorDog.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
    descriptionDogInput.style.borderColor = '#37C70C';
    return true;
}

function validateAge()
{
    var ageDog = document.getElementById('age').value;
    var ageDogInput = document.getElementById('age')


    if (ageDog.length == 0)
    {
        ageErrorDog.innerHTML = '';
        return false;
    }

    if (ageDog >=0 && ageDog <= 15){
        ageErrorDog.innerHTML = '<i class="fas fa-check-circle" style="color: #37C70C"></i>';
        ageDogInput.style.borderColor = '#37C70C';
        return true;

    }

    ageErrorDog.innerHTML = '<i class="fa-solid fa-circle-xmark" style="color: #CF2608"></i>';
    ageDogInput.style.borderColor = '#CF2608';
    return false;

}

function validateForm()
{
    if (!validateImage() || !validateName() || !validateDescription() || !validateAge())
    {
        submitErrorDog.style.display = 'block';
        submitErrorDog.style.fontWeight = 'bolder';
        submitErrorDog.style.color = '#CF2608';
        submitErrorDog.innerHTML = "Javítsd ki a hibákat!";
        setTimeout(function (){submitErrorDog.style.display = ' none '}, 3000)
        return false;
    }
}