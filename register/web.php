<?php
session_start();

require_once "config.php";
require "functions_def.php";

$username = "";
$password = "";
$passwordConfirm = "";
$firstname = "";
$lastname = "";
$email = "";
$action = "";

$referer = $_SERVER['HTTP_REFERER'];
$action = mysqli_real_escape_string($connection, $_POST["action"]);

if ($action != "" AND in_array($action, $actions) AND strpos($referer, SITE) !== false) {


    switch ($action) {
        case "login":

            $username = mysqli_real_escape_string($connection, trim($_POST["username"]));
            $password = mysqli_real_escape_string($connection, trim($_POST["password"]));

            if (!empty($username) AND !empty($password)) {    
                $data = checkUserLogin($username, $password);

                if ($data AND is_int($data['id_user'])) {
                    // session_regenerate_id();
                    $_SESSION['username'] = $username;
                    $_SESSION['id_user'] = $data['id_user'];
                    redirection('../index.php');
                } else {
                    redirection('../login.php?l=1');
                }

            } else {
                redirection('../login.php?l=1');
            }
            break;


        case "register" :

            if(isset($_POST['username'])) {
                $username = mysqli_real_escape_string($connection, trim($_POST["username"]));
            }
           
            if(isset($_POST['firstname'])) {
                $firstname = mysqli_real_escape_string($connection, trim($_POST["firstname"]));
            }

            if(isset($_POST['lastname'])) {
                $lastname = mysqli_real_escape_string($connection, trim($_POST["lastname"]));
            }

            if (isset($_POST['password'])) {
                $password = mysqli_real_escape_string($connection, trim($_POST["password"]));
            }

            if (isset($_POST['passwordConfirm'])) {
                $passwordConfirm = mysqli_real_escape_string($connection, trim($_POST["passwordConfirm"])); 
            } 
           
            if (isset($_POST['email'])) {
                 $email = mysqli_real_escape_string($connection, trim($_POST["email"]));
            }

            if (empty($username)) {
                redirection('../login.php?r=4');
            }

            if (empty($firstname)) {
                redirection('../login.php?r=4');
            }

            if (empty($lastname)) {
                redirection('../login.php?r=4');
            }

            if (empty($password) OR strlen($password) < 7) {
                redirection('../login.php?r=9');
            }

            if (empty($passwordConfirm) OR strlen($passwordConfirm) < 7) {
                redirection('../login.php?r=9');
            }

            if ($password !== $passwordConfirm) {
                redirection('../login.php?r=7');
            }

            if (empty($email) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                redirection('../login.php?r=8');
            }

            if (!existsUser($username)) {
                $token = createCode(40);
                $id_user_web = registerUser($username, $password, $firstname, $lastname, $email, $token);
                if (sendData($username, $email, $token)) {
                    redirection("../login.php?r=3");
                } else {
                    addEmailFailure($id_user_web);
                    redirection("../login.php?r=10");
                }

            } else {
                redirection('../login.php?r=2');
            }

            break;

        case "forget" :
            // To do
            break;

        default:
            redirection('../login.php?l=0');
            break;
    }

} else {
    redirection('../login.php?l=0');
}
