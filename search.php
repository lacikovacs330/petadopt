<?php 
session_start();
require_once('assets/php/header.php');
require_once('assets/php/nav.php');
require_once('config/db.php');

if(isset($_POST["search"]) && !empty($_POST["search"])) {
    $search = "%".$_POST["search"]."%";
    $sql = "SELECT pets.id, species.name as specie, pets.description, pets.image, pets.name, pets.gender, pets.age, animals.id as animalId FROM pets, species, animals where (species.name like '$search' and species.id = pets.specieId and animals.id = species.animalId) or (pets.name like '$search' and pets.specieId = species.id and animals.id = species.animalId)";
    $result = $conn->query($sql);

    ?>
<div class="card">
    <div class="card-container">
        <?php
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
        <div class="card-content">
            <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="150px" height="150px" /><br>
            <span style="font-size: 23px"><b><?= $row["name"] ?></b></span>
            <span class="pet-specie"><?= $row["specie"] ?></span>
            <span class="pet-description"><?= $row["description"] ?></span>
            <button type="button" onclick="openModal(<?= $row['id'] ?>)" class="infoButton">Részletek</button>
            <button onclick="toggleHeart(event)"><i class="fas fa-heart" style="font-size: 20px"></i></button>
        </div> 

        <div class="bg-modal <?= "bg-modal-".$row['id'] ?>">
            <div class="modal-content">
                <div class="leftSide">
                    <img src="assets/img/<?= $row["image"] ?>" alt="animal" width="50%" height="70%" />
                </div>
                <div class="rightSide">
                <span class="modalTitle">Fajta</span>
                    <span><?= $row["specie"] ?></span>
                    <span class="modalTitle">Név</span>
                    <span><?= $row["name"] ?></span>
                    <span class="modalTitle">Nem</span>
                    <span><?= $row["gender"] ?></span>
                    <span class="modalTitle">Kor</span>
                    <span><?= $row["age"] ?></span>
                    <span class="modalTitle">Leírás</span>
                    <span><?= $row["description"] ?></span>
                    <div class="modalButton">
                        <a href="adopt.php?animalId=<?= $row["animalId"] ?>&petId=<?= $row["id"] ?>"><button type="submit" value="Submit" class="adoptButton">Örökbefogadás</button></a>
                    </div>
                </div>
                <div class="close1" onclick="closeModal(event)">+</div>
            </div>
        </div>

        <script src="assets/js/main.js"></script>

        <?php
}
}
else {
    echo "<h1>Nincs találat!</h1>";
}
}
else {
?>
        <?php
    echo "<h1>Nincs találat!</h1>";
    ?>
    </div>
</div>
</body>

</html>
<?php
}