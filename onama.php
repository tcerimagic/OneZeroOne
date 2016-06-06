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
    <script src="scripts/ajax.js"></script>
   <script src="scripts/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>


    <?php 
    require 'bodyTag.php';
    include 'header.php'; ?>

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