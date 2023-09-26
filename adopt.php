<?php 
session_start();
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    redirection(SITE. "login.php");
}

require_once('assets/php/header.php');
require_once('assets/php/nav.php');
require_once('config/db.php');

$petId = $_GET["petId"];
$animalId = $_GET["animalId"];

$sql = "SELECT pets.id, species.name as specie, pets.description, pets.image, pets.name, pets.gender, pets.age, pets.adopted FROM pets, species WHERE species.id = pets.specieId and pets.id = ".$petId; 
$result = $conn->query($sql);
$petResult = $result->fetch_assoc();

$sql = "SELECT * FROM animals WHERE id = ".$animalId;
$result = $conn->query($sql);
$animalResult = $result->fetch_assoc();

?>
<div id="adopt">
    <form method="post" id="adopt">
        <label for="salad">Kiválasztott állat</label>
        <input type="text" disabled value="<?= $petResult["name"] . ', ' .$petResult["specie"] ?>">

        <div class="input-group" style="width: 100%">
            <label for="lname">Vezetéknév<small style="color: #CF2608">*</small></label>
            <input type="text" id="lastnameAdopt" name="lastnameAdopt" required placeholder="Vezetékneve.." onkeyup="validateLName6()">
            <span id="lastname-adopt-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="fname">Keresztnév<small style="color: #CF2608">*</small></label>
            <input type="text" id="firstnameAdopt" name="firstnameAdopt" required placeholder="Keresztneve.." onkeyup="validateFName6()">
            <span id="firstname-adopt-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="email">EMAIL<small style="color: #CF2608">*</small></label>
            <input type="email" id="emailAdopt" name="emailAdopt" required placeholder="example@gmail.com" onkeyup="validateEmail6()">
            <span id="email-adopt-error"></span>
        </div>  

        <div class="input-group" style="width: 100%">
            <label for="address">Lakcím<small style="color: #CF2608">*</small></label>
            <input type="text" id="addressAdopt" name="addressAdopt" required placeholder="Adja meg lakcímét" onkeyup="validateAddress6()">
            <span id="address-adopt-error"></span>
        </div>  

        <div class="input-group" style="width: 100%">
            <input type="submit" value="Örökbefogadom" name="adopt" onclick="return validateForm6()">
        </div>
        <span id="subit-adopt-error"></span>

        <?php
            if(isset($_POST["adopt"])) {
                if(isset($_POST["lastnameAdopt"]) && !empty($_POST["lastnameAdopt"]) && 
                    isset($_POST["firstnameAdopt"]) && !empty($_POST["firstnameAdopt"]) &&
                    isset($_POST["emailAdopt"]) && !empty($_POST["emailAdopt"]) &&
                    isset($_POST["addressAdopt"]) && !empty($_POST["addressAdopt"]) &&
                    $petResult["adopted"] != 0) {

            $firstname = $_POST["firstnameAdopt"];
            $lastname = $_POST["lastnameAdopt"];
            $email = $_POST["emailAdopt"];
            $address = $_POST["addressAdopt"];
            $user = $_SESSION["username"];
            $specie = $petResult["specie"];
            $name = $petResult["name"];

            $sql1 = "INSERT INTO adopts (user, pet_name, pet_specie, lastname, firstname, email, address) values ('$user', '$name', '$specie', '$lastname', '$firstname', '$email', '$address')";

            if ($conn->query($sql1) === TRUE) {
                echo '<div class="alertAdopt"><span>Sikeresen örökbefogadta: ' .$name. '</span></div>';
                $sql2 = "UPDATE pets SET adopted = 0 where pets.id = '$petId'";
                if($conn->query($sql2)){
                    echo "<meta http-equiv='refresh' content='2'>";
                }
            } 
            
              else {
                echo '<div class="alertAdoptErr"><span>Az alábbi kiskedvenc már örökbe lett fogadva!</span></div>';
              }

        }
        else {
            echo '<div class="alertAdoptErr"><span>Az alábbi kiskedvenc már örökbe lett fogadva!</span></div>';
            echo "<meta http-equiv='refresh' content='2'>";
          }
    }
?>

    </form>
</div>
<script src="assets/js/adopt.js"></script>
</body>
</html>