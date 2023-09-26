<?php
session_start();
require_once('config/db.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    redirection(SITE. "login.php");
}
require_once('assets/php/header.php');
require_once('assets/php/nav.php');


$sql = "SELECT * FROM species WHERE animalId = 2";
$dogSpecies = $conn->query($sql);

$sql1 = "SELECT * FROM species WHERE animalId = 1";
$catSpecies = $conn->query($sql1); 

$sql2 = "SELECT * FROM users_web";
$users = $conn->query($sql2);


?>
<div class="add-title">
    <h1>HÍRDETÉS FELADÁSA</h1>
</div>
<div id="adding-new_pet">
    <h3>KUTYA</h3>
    <form method="post" action="action/dog-posting.php">

        <div class="input-group" style="width: 100%">
            <label for="image">KÉP<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="image" name="image" placeholder="Kiskedvence képe" onkeyup="validateImage()"><br>
            <span id="image-dog-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="name">NÉV<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="name" name="name" placeholder="Kiskedvenc neve" onkeyup="validateName()"><br>
            <span id="name-dog-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="description">LEíRÁS<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="description" name="description" placeholder="Vigye be a házikedvence leírását" onkeyup="validateDescription()"><br>
            <span id="description-dog-error"></span>
        </div>

        <label for="animal">FAJTA<small style="color: #CF2608">*</small></label>
        <select name="specie" id="specie">
            <?php
                while($row = $dogSpecies->fetch_assoc()) {
                ?>
                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                <?php
                }
            ?>
        </select>
         
        <div class="input-group" style="width: 100%">
            <label for="age">ÉV<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="age" name="age" placeholder="Adja meg kiskedvence korát! (max 15)" onkeyup="validateAge()"><br>
            <span id="age-dog-error"></span>
        </div>

        <label for="gender">NEM<small style="color: #CF2608">*</small></label><br>
        <select name="gender" id="gender">
            <option value="Fiú">Fiú</option>
            <option value="Lány">Lány</option>
        </select>

        <div class="input-group" style="width: 100%">
            <button type="submit" name="sbDog" value="add" onclick="return validateForm()">FELADÁS</button>
        </div>
        <span id="subit-dog-error"></span>

        <?php
            if(isset($_SESSION["adDog-msg"]) && $_SESSION["adDog-msg"] == "succ"){
                echo '<div class="alertData"><span>Sikeresen feladta kutyáját!</span></div>';
                unset($_SESSION["adDog-msg"]);
            }
            else if(isset($_SESSION["adDog-msg"]) && $_SESSION["adDog-msg"] == "err") {
                echo '<div class="alertDataErr"><span>Valami hiba történt a feladás közben. Próbálja újra!</span></div>';
                unset($_SESSION["adDog-msg"]);
            }
        ?>
    </form>
    <h3>MACSKA</h3>
    <form method="post" action="action/cat-posting.php">

        <div class="input-group" style="width: 100%">
            <label for="image">KÉP<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="imageCat" name="image" placeholder="Kiskedvence képe" onkeyup="validateImageCat()"><br>
            <span id="image-cat-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="nameCat">NÉV<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="nameCat" name="name" placeholder="Kiskedvenc neve" onkeyup="validateNameCat()"><br>
            <span id="name-cat-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="descriptionCat">LEíRÁS<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="descriptionCat" name="description" placeholder="Vigye be a házikedvence leírását" onkeyup="validateDescriptionCat()"><br>
            <span id="desc-cat-error"></span>
        </div>

        <label for="animal">FAJTA<small style="color: #CF2608">*</small></label>
        <select name="specie" id="specie">
            <?php
                while($row = $catSpecies->fetch_assoc()) {
                ?>
                <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
                <?php
                }
            ?>
        </select> 

        <div class="input-group" style="width: 100%">
            <label for="ageCat">ÉV<small style="color: #CF2608">*</small></label><br>
            <input type="text" id="ageCat" name="age" placeholder="Adja meg kiskedvence korát! (max 15)" onkeyup="validateAgeCat()"><br>
            <span id="age-cat-error"></span>
        </div>

        <label for="genderCat">NEM<small style="color: #CF2608">*</small></label><br>
        <select name="gender" id="genderCat">
            <option value="Fiú">Fiú</option>
            <option value="Lány">Lány</option>
        </select>

        <div class="input-group" style="width: 100%">
            <button type="submit" name="sbCat" value="add" onclick="return validateFormCat()">FELADÁS</button>
        </div>
        <span id="subit-cat-error"></span>

        <?php
            if(isset($_SESSION["adCat-msg"]) && $_SESSION["adCat-msg"] == "succ"){
                echo '<div class="alertData"><span>Sikeresen feladta cicáját!</span></div>';
                unset($_SESSION["adCat-msg"]);
            }
            else if(isset($_SESSION["adCat-msg"]) && $_SESSION["adCat-msg"] == "err") {
                echo '<div class="alertDataErr"><span>Valami hiba történt a feladás közben. Próbálja újra!</span></div>';
                unset($_SESSION["adCat-msg"]);
            }
        ?>
    </form>
</div>
<div class="all-ad">
    <a href="all-ad.php"><button type="submit" name="allAd" value="allAd">HÍRDETÉSEIM MEGTEKINTÉSE</button></a>
</div>

<script src="assets/js/dog-posting.js"></script>
<script src="assets/js/cat-posting.js"></script>

<?php
require_once('assets/php/footer.php');
?>
</body>
<style>

.input-group {
    position: relative;
}

input {
    padding-left:48px;
}

.input-group span{
    position: absolute;
    left: 810px;
    bottom: 30px;
}

/*Kutya*/

@media only screen and (max-width: 1668px) {
    .input-group span {
        position: absolute;
        left: 750px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1541px) {
    .input-group span {
        position: absolute;
        left: 650px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1340px) {
    .input-group span {
        position: absolute;
        left: 500px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1046px) {
    .input-group span {
        position: absolute;
        left: 400px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 843px) {
    .input-group span {
        position: absolute;
        left: 300px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 640px) {
    .input-group span {
        position: absolute;
        left: 200px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 443px) {
    .input-group span {
        position: absolute;
        left: 170px;
        bottom: 30px;
    }
}

/*Macsek*/

@media only screen and (max-width: 1668px) {
    .input-group2 span {
        position: absolute;
        left: 750px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1541px) {
    .input-group2 span {
        position: absolute;
        left: 650px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1340px) {
    .input-group2 span {
        position: absolute;
        left: 500px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 1046px) {
    .input-group2 span {
        position: absolute;
        left: 400px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 843px) {
    .input-group2 span {
        position: absolute;
        left: 300px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 640px) {
    .input-group2 span {
        position: absolute;
        left: 200px;
        bottom: 30px;
    }
}

@media only screen and (max-width: 443px) {
    .input-group2 span {
        position: absolute;
        left: 170px;
        bottom: 30px;
    }
}
</style>
</html>