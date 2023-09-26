<?php
define("SITE", "https://printf.proj.vts.su.ac.rs/petshop/petshop/"); // enter your path on localhost
define("HOST", "localhost");
define("USER", "printf");
define("PASSWORD", "3J60aGXqvmHI0BG");
define("DATABASE", "printf");
define("SECRET", "gfhUi34xVbds23Qgk");

$actions = ['login', 'register', 'forget'];

$messages = [
    0 => 'Közvetlen hozzáférés megtagadva!',
    1 => 'Nem létezik a felhasználó, vagy hibásak az adatok!',
    2 => 'Felhasználónév foglalt!',
    3 => 'Sikeres regisztáció, aktiválja fiókját!',
    4 => 'Töltse ki az összes mezőt!',
    5 => 'Kijelentkezett!',
    6 => 'Fiókja sikeresen aktiválva lett!',
    7 => 'Nem egyezik a jelszava!',
    8 => 'Érvényetelen e-mail cím!',
    9 => 'Legalább 8 karakter hosszú legyen a jelszava!',
    10 => 'Valami hiba történt. Próbálja újra később!',
    11 => 'Fiókja már aktiválva van!',
    12 => 'Jelszó visszaállító email kiküldve!',
    13 => 'Jelszó megváltoztatva!',
    14 => 'A fiókod letiltásra került, vagy nincs még aktiválva!',
    15 => 'Nem létező e-mail cím!'
];
