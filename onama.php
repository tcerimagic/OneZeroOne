<?php
if(isset($_REQUEST['logoutBtn'])){

    session_start();
    unset($_SESSION['loginSession']);
}
else {
    session_start();

}

?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>O nama</title>
   <script src="scripts/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="logo">101
        <div class="logo-text">Tech Shop</div>
    </div>
    <ul class="flex-container wrap">
        <li class="flex-item">
            <a href="index.php" class="button">Naslovna</a>
        </li>
        <li class="flex-item">
            <a href="katalog.php" class="button">Katalog</a>
        </li>
        <li class="flex-item">
            <a href="kontakt.php" class="button">Kontakt</a>
        </li>
        <li class="flex-item">
            <a href="onama.php" class="button">O nama</a>
        </li>
        <?php
        if(isset($_SESSION['loginSession'])){

            print('
        <li class="flex-item">
            <a href="novosti.php" class="button">Dodaj novost</a>
        </li>
        <li class="flex-item">
            <a href="index.php?logoutBtn=true" class="button">Logout</a>
        </li>');
        }
        else{
            print('<li class="flex-item">
            <a href="loginPage.php" class="button" name="loginBtn">Login</a>
        </li>');
        }



        ?>
        <li class="dokraja"></li>
    </ul>
    <ul class="flex-container-posts wrap">
        <li class="onama-wrap">
            <div class="onama"></div>
            <h1 class="center">Timur Ćerimagić</h1>
            <div>Ovdje je tekst o dizajneru, ovdje njega hvalimo i kudimo bla bla Ovdje je tekst o dizajneru, ovdje njega hvalimo
                i kudimo bla bla Ovdje je tekst o dizajneru, ovdje njega hvalimo i kudimo bla bla Ovdje je tekst o dizajneru,
                ovdje njega hvalimo i kudimo bla bla Ovdje je tekst o dizajneru, ovdje njega hvalimo i kudimo bla bla Ovdje
                je tekst o dizajneru, ovdje njega hvalimo i kudimo bla bla Ovdje je tekst o dizajneru, ovdje njega hvalimo
                i kudimo bla bla
            </div>
            <ul class="facebook">
                <li><a class="dodatno remove_underline" href="https://www.facebook.com/CeraMaliI">Facebook profil</a></li>
            </ul>

            <ul class="twitter">
                <li><a class="dodatno remove_underline" href="https://twitter.com/tcerimagic1">Twitter profil</a></li>
            </ul>
            <ul class="youtube">
                <li><a class="dodatno remove_underline" href="https://www.youtube.com/channel/UCkGdX-S7L8zIsicDC47idiA">YouTube profil</a></li>
            </ul>
        </li>
    </ul>

</body>

</html>