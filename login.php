<?php 
session_start();
require_once('assets/php/header.php');
require_once('register/config.php');
require_once('register/functions_def.php');

if (!isAuthenticated()) {
    require_once('assets/php/nav-guest.php');
}
else {
    redirection(SITE. "index.php");
    require_once('assets/php/nav.php');
}
?>
<div id="log-container">
    <div id="sign-up">
        <div id="sign-up-form">
            <div class="sign-up-main">
                <i class="fa">&#xf2b5;</i>
                <form method="post" id="signup" action="register/web.php">
                    <div style="display: flex; gap: 1em;">
                        <div style="width: 50%">

                            <div class="input-group" style="width: 100%">
                                <label for="userName">FELHASZNÁLÓNÉV<small style="color: #CF2608">*</small></label>
                                <input type="text" id="userName" name="username" required placeholder="Felhasználónév.."
                                    onkeyup="validateUserName()">
                                <span id="username-login-error"></span>
                            </div>

                            <div class="input-group" style="width: 100%">
                                <label for="fName">KERESZTNÉV<small style="color: #CF2608">*</small></label>
                                <input type="text" id="fName" name="firstname" required placeholder="Keresztnév.."
                                    onkeyup="validateFName()">
                                <span id="fname-login-error"></span>
                            </div>

                            <div class="input-group" style="width: 100%">
                                <label for="lName">VEZETÉKNÉV<small style="color: #CF2608">*</small></label>
                                <input type="text" id="lName" name="lastname" required placeholder="Vezetéknév.."
                                    onkeyup="validateLName()">
                                <span id="lname-login-error"></span>
                            </div>
                        </div>
                        <div style="width: 50%">

                            <div class="input-group" style="width: 100%">
                                <label for="email">EMAIL<small style="color: #CF2608">*</small></label>
                                <input type="email" id="email" name="email" class="mainInput" required
                                    placeholder="example@gmail.com" onkeyup="validateEmail()">
                                <span id="email-login-error"></span>
                            </div>

                            <div class="input-group" style="width: 100%">
                                <label for="firstPassword">JELSZÓ<small style="color: #CF2608">*</small></label>
                                <input type="password" id="firstPassword" name="password" required
                                    placeholder="Jelszó.." onkeyup="validateFirstPassword()">
                                <span id="first-password-login-error"></span>
                            </div>

                            <div class="input-group" style="width: 100%">
                                <label for="secondPassword">JELSZÓ ISMÉT<small style="color: #CF2608">*</small></label>
                                <input type="password" id="secondPassword" name="passwordConfirm" required
                                    placeholder="Jelszó ismét.." onkeyup="validateSecondPassword()">
                                <span id="second-password-login-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group" style="width: 100%">
                        <input type="hidden" name="action" value="register">
                        <input type="submit" value="Regisztráció" onclick="return validateRegForm()">
                    </div>
                    <small id="wrongPass" style="color: #F00">Jelszavának legalább 8 karakterből kell álnia, és tartalmaznia kell egy nagy, egy kis betűt és egy számot!</small>
                    <span id="subit-login-error"></span>
                    <?php
            $r = 0;

            if (isset($_GET["r"]) and is_numeric($_GET['r'])) {
                $r = (int)$_GET["r"];

                if (array_key_exists($r, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$r].'
                        <span class="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    ';
                }
            }
            ?>
                </form>
            </div>
        </div>
    </div>
    <div id="sign-in">
        <div id="sign-in-form">
            <div class="sign-in-main">
                <i style='font-size:35px' class='fas'>&#xf2f6;</i>
                <form method="post" id="signin" action="register/web.php">
                    <label for="userName">FELHASZNÁLÓNÉV</label>
                    <input type="text" id="userName" name="username" required placeholder="Felhasználónév..">

                    <label for="password">JELSZÓ</label>
                    <input type="password" id="password" name="password" class="mainInput" required
                        placeholder="Jelszó..">
                    <input type="hidden" name="action" value="login">
                    <input type="submit" value="Bejelentkezés">
                    <?php

            $l = 0;

            if (isset($_GET["l"]) and is_numeric($_GET['l'])) {
                $l = (int)$_GET["l"];

                if (array_key_exists($l, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$l].'
                        <span class="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    ';
                }
            }
            ?>
                </form>
                <span id="resetSpan">Elfelejtett jelszó esetén</span>
                <form action="register/web.php" method="post" name="forget" id="forget">
                    <div class="reset-pw">
                        <label for="forgetEmail">EMAIL<span style="color: #CF2608">*</span></label>
                        <input type="email" id="forgetEmail" placeholder="Írja be e-mail-jét" name="email">
                    </div>
                    <input type="hidden" name="action" value="forget">
                    <input type="submit" value="Jelszó újrakérése">
                    <?php

            $f = 0;

            if (isset($_GET["f"]) and is_numeric($_GET['f'])) {
                $f = (int)$_GET["f"];

                if (array_key_exists($f, $messages)) {
                    echo '
                    <div class="alert" role="alert">
                        '.$messages[$f].'
                        <span class="closeAlert" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </span>
                    </div>
                    ';
                }
            }
            ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="assets/js/register.js"></script>
</body>

</html>