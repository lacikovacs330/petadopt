<?php
session_start();
require_once('../config/db.php');
require_once('../register/config.php');
require_once('../register/functions_def.php');

if(isset($_POST["sb"])) {
                if(isset($_POST["firstname"]) && !empty($_POST["firstname"]) && 
                    isset($_POST["lastname"]) && !empty($_POST["lastname"]) &&
                    isset($_POST["email"]) && !empty($_POST["email"]) &&
                    isset($_POST["question"]) && !empty($_POST["question"]) &&
                    isset($_POST["message"]) && !empty($_POST["message"])) {

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $question = $_POST["question"];
            $message = $_POST["message"];

            $sql1 = "INSERT INTO contacts (question_id, firstname, lastname, email, text) values ('$question', '$firstname', '$lastname', '$email', '$message')";

            if ($conn->query($sql1) === TRUE) {
                $_SESSION["contact-msg"] = "succ";
                redirection(SITE."contact.php");
            } 
            else {
                $_SESSION["contact-msg"] = "err";
                redirection(SITE."contact.php");
            }
        }
        else {
            $_SESSION["contact-msg"] = "err";
            redirection(SITE."contact.php");
        }
}
else {
    redirection(SITE."index.php");
}
?>