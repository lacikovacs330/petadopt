<?php
require_once('config/db.php');
?>

<?php
$sql = "SELECT * FROM users_web WHERE username = '".$_SESSION["username"]."'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<nav>
    <ul class="nonResponsive">
        <li><a href="index.php">Kezdőlap</a></li>
        <li><a href="contact.php">Kapcsolat</a></li>
        <li><a href="animals.php">Állataink</a></li>
        <li><a href="favorites.php">Kedvencek</a></li>
        <li><a href="about.php">Rólunk</a></li>

        <?php
        if($row["level"] == 2) {
        ?>
        <li><a href="ad-posting.php">Hírdetés feladás</a></li>
        <li class="admin-console-nav"><a href="admin-console.php">Adminpult</a></li>
        <?php
        }
        else if($row["level"] <= 1){ ?>
        <li><a href="ad-posting.php">Hírdetés feladás</a></li>
        <?php
        }
        ?>
        <li><a href="register/logout.php">Kijelentkezés</a></li><br>
    </ul>



    <div class="dropdown">
        <span class="dropmenu"><i style="font-size:24px" class="fa">&#xf0c9;</i></span>
        <div class="dropdown-content">
            <li style="list-style-type: none"><a href="index.php">Kezdőlap</a></li>
            <li style="list-style-type: none"><a href="contact.php">Kapcsolat</a></li>
            <li style="list-style-type: none"><a href="animals.php">Állataink</a></li>
            <li style="list-style-type: none"><a href="favorites.php">Kedvencek</a></li>
            <li style="list-style-type: none"><a href="about.php">Rólunk</a></li>
            <?php
        if($row["level"] == 2) {
        ?>
        <li style="list-style-type: none"><a href="ad-posting.php">Hírdetés feladás</a></li>
        <li style="list-style-type: none" class="admin-console-nav"><a href="admin-console.php">Adminpult</a></li>
        <?php
        }
        else if($row["level"] <= 1){ ?>
        <li style="list-style-type: none"><a href="ad-posting.php">Hírdetés feladás</a></li>
        <?php
        }
        ?>
        <li style="list-style-type: none"><a href="register/logout.php">Kijelentkezés</a></li>
            <?php
            if($row["level"] == 2) {
                ?>
                <span style="margin-right: 15px; font-family: 'Oswald', sans-serif; text-transform: uppercase; font-weight: bolder; font-size: 15px">
                <a style="color: #04AA6D;" href="edit-profile.php"><?= $_SESSION['username'] ?></a><i class="material-icons" title="Admin" style="font-size: 13px">&#xe8e8;</i></span>
                <?php
            }
            else { ?>
                <span style="margin-right: 15px; font-family: 'Oswald', sans-serif; text-transform: uppercase; font-weight: bolder; font-size: 15px">
                <a style="color: #04AA6D;" href="edit-profile.php"><?= $_SESSION['username'] ?></a></span>
                <?php
            }
            ?>
        </div>
    </div>

    <div>
        <?php
        if($row["level"] == 2) {
        ?>
        <span class="nameDisplay" style="margin-right: 15px; font-family: 'Oswald', sans-serif; text-transform: uppercase; font-weight: bolder; font-size: 15px">Üdv,
            <a style="color: #04AA6D;" href="edit-profile.php"><?= $_SESSION['username'] ?></a><i class="material-icons"
                title="Admin" style="font-size: 17px">&#xe8e8;</i></span>
        <a href="index.php" class="logo"><i style='font-size:24px' class='fas'>&#xf1b0;</i>Petadopt</a>
        <?php
        }
        else { ?>
        <span class="nameDisplay" style="margin-right: 15px; font-family: 'Oswald', sans-serif; text-transform: uppercase; font-weight: bolder; font-size: 15px">Üdv,
            <a style="color: #04AA6D;" href="edit-profile.php"><?= $_SESSION['username'] ?></a></span>
        <a href="index.php" class="logo"><i style='font-size:24px' class='fas'>&#xf1b0;</i>Petadopt</a>
        <?php 
        }
        ?>
    </div>
</nav>

<button onclick="topFunction()" id="myBtn" title="Vissza a tetejére"><i style="font-size:24px"
        class="fa arrow-up">&#xf077;</i></button>

<script src="assets/js/script.js"></script>

<div id="social-media-logos">
    <a href="https://facebook.com" class="fa fa-facebook" title="Facebook"></a>
    <a href="https://twitter.com" class="fa fa-twitter" title="Twitter"></a>
    <a href="https://linkedin.com" class="fa fa-linkedin" title="LinkedIn"></a>
    <a href="https://youtube.com" class="fa fa-youtube" title="Youtube"></a>
    <a href="https://instagram.com" class="fa fa-instagram" title="Instagram"></a>
</div>

<div class="loader">
    <img src="assets/img/downloading.gif">
</div>


<style>
nav {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 60px;
    padding: 0 2em;
    z-index: 1;
    background: rgba(255, 255, 255, .5);
}

nav ul, nav li {
    margin: 0;
    padding: 0;
}

nav ul {
    display: flex;
    justify-content: center;
    align-items: center;
    list-style: none;
    gap: 1em;
}

nav a {
    font-weight: bolder;
    font-size: 15px;
    color: #000;
    text-decoration: none;
    text-transform: uppercase;
    transition: all 280ms ease-in-out;
}

nav a:hover {
    color: dimgrey;
    letter-spacing: .1em;
}


.loader {
    position: fixed;
    z-index: 99;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
}

.loader img {
    width: 150px;
}

.loader.hidden {
    animation: fadeOut 1s;
    animation-fill-mode: forwards;
}

@keyframes fadeOut {
    100% {
        opacity: 0;
        visibility: hidden;
    }

}

#social-media-logos {
    display: flex;
    flex-direction: column;
    position: fixed;
    bottom: 35%;
    left: 20px;
    z-index: 99;
    border: none;
    outline: none;
    cursor: pointer;
    transition: 1s ease-out 100ms;
}

#social-media-logos .fa {
    padding: 15px;
    font-size: 25px;
    width: 40px;
    text-align: center;
    text-decoration: none;
}

#social-media-logos .fa:hover {
    opacity: 0.7;
}

#social-media-logos .fa-facebook {
    background: #3B5998;
    color: #fff;
}

#social-media-logos .fa-twitter {
    background: #55ACEE;
    color: #fff;
}

#social-media-logos .fa-linkedin {
    background: #007bb5;
    color: #fff;
}

#social-media-logos .fa-youtube {
    background: #bb0000;
    color: #fff;
}

#social-media-logos .fa-instagram {
    background: #125688;
    color: #fff;
}

@media only screen and (max-width: 1000px) {
    #social-media-logos {
        display: none;
    }
}

@media only screen and (max-width: 800px) {
    .admin-console-nav {
        display: none;
    }
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropmenu {
    display: none;
}

.dropdown-content {
    margin-top: 18px;
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    width: 180px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: #000;
    margin-top: 8px;
    margin-left: 12px;
    text-decoration: none;
    display: inline-block;
}


.dropdown:hover .dropdown-content {
    display: block;
}

@media only screen and (max-width: 1000px) {
    .nonResponsive {
        display: none;
    }

    .dropmenu {
        display: inline-block;
    }

    nav ul {
        display: none;
    }

    .nameDisplay {
        display: none;
    }


}

</style>
