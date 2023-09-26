<?php 
session_start();
require_once('config/db.php');
require_once('assets/php/header.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    require_once('assets/php/nav-guest.php');
}
else {
    require_once('assets/php/nav.php');
}
?>

<?php 
$sql = "select * from contact_question";
$restaurants = $conn->query($sql);
?>

<div id="contact">
    <div class="contact-title">
        <span>Lépj velünk kapcsolatba</span>
    </div>
</div>
<div id="contact-form">
    <form method="post" id="contactId" action="action/contact-action.php">

        <div class="input-group" style="width: 100%">
            <label for="fname">Keresztneve<small style="color: #CF2608">*</small></label>
            <input type="text" id="fname" name="firstname" required placeholder="Keresztneve.." onkeyup="validateFName()">
            <span id="fname-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="lname">Vezetékneve<small style="color: #CF2608">*</small></label>
            <input type="text" id="lname" name="lastname" required placeholder="Vezetékneve.." onkeyup="validateLName()">
            <span id="lname-error"></span>
        </div>

        <div class="input-group" style="width: 100%">
            <label for="email">EMAIL<small style="color: #CF2608">*</small></label>
            <input type="email" id="email" name="email" required placeholder="example@gmail.com" onkeyup="validateEmail()">
            <span id="email-error"></span>
        </div>

        <label for="question">Kérdés<span style="color: #CF2608">*</span></label>
        <select id="question" name="question">
            <option selected disabled>Miben segíthetünk?</option>
            <?php
                while($row = $restaurants->fetch_assoc()) {
                ?>
            <option value="<?= $row["question_id"] ?>"><?= $row["question"] ?></option>
            <?php
                }
            ?>
        </select>

        <div class="input-group" style="width: 100%">
            <label for="message">Üzenet<small style="color: #CF2608">*</small></label>
            <textarea id="message" name="message" required placeholder="Irja le üzenetét.." onkeyup="validateMessage()"></textarea>
            <span id="message-error"></span>
        </div>
              
        <div class="input-group" style="width: 100%">
            <input type="submit" value="Elküld" name="sb" onclick="return validateForm()">
        </div>
        <span id="subit-error"></span>
        <?php
        if(isset($_SESSION["contact-msg"]) && $_SESSION["contact-msg"] == "succ"){
            echo '<div class="alertContact"><span>Sikeresen rögzítettük kérdésed!</span></div>';
            unset($_SESSION["contact-msg"]);
        }
        else if(isset($_SESSION["contact-msg"]) && $_SESSION["contact-msg"] == "err") {
            echo '<div class="alertContactErr"><span>Valami hiba történt. Próbálja újra!</span></div>';
            unset($_SESSION["contact-msg"]);
        }
        ?>
    </form>
</div>

<script src="assets/js/contact.js"></script>

<?php
require_once('assets/php/footer.php');
?>
</body>
</html>