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
    <script src="scripts/ajax.js"></script>
    <script src="scripts/script.js"></script>
    <script src="scripts/validacijeScript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>


    <?php require 'bodyTag.php';
          include 'header.php'; ?>



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