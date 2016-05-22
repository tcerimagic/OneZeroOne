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
    <title>Kontakt</title>
    <script src="scripts/script.js"></script>
    <script src="scripts/validacijeScript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="logo">101
        <div class="logo-text">Tech Shop</div>
    </div>

     <?php
     if(isset($_SESSION['loginSession'])){
         
         echo '<div id="loginInfo">Logovani ste kao '.$_SESSION['loginSession'].'.</div>';
         
     }
     else{
         echo '<div id="loginInfo">Niste logovani</div>';

     }
     
     
     ?>
    
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

    <h1 class="center">Podrška kupcima - Kontaktirajte nas</h1>
    <h4 class="center">Za pitanja vezana uz narudžbe ili za ostale informacije o našim proizvodima.</h4>


    <form id="forma">
        <div class="naslov-forma">POŠALJI PORUKU </div>
        <label>Zaglavlje predmeta:</label>
        <select>
            <option value="1" selected="selected">/</option>
            <option value="2">Prodaja</option>
            <option value="3">Žalbe i pohvale</option>
        </select>
        <input placeholder="Ime" type="text" id="ime" onkeyup="validirajTekst(this)">
        <input placeholder="Prezime" type="text" id="prezime" onkeyup="validirajTekst(this)" >
        <input placeholder="E-mail" type="text" id="email" onkeyup="validirajEmail(this)" required >
        <input placeholder="Referenca narudžbe" type="text" id="referenca" onkeyup="validirajTekst(this)" required>
        <label for="file">Dodaj prilog:</label>
        <input type="file" id="file">
        <label for="poruka">Poruka:</label>
        <textarea id="poruka" required></textarea>
        <button type="submit" onclick="validirajFormu()" class="gumb-centar" id="salji">Pošalji</button>

    </form>

</body>

</html>