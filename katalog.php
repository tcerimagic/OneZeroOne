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
    <title>Katalog</title>
    <script src="scripts/script.js"></script>
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

    <h1 class="center">Katalog:</h1>

    <table>
        <thead class="head">
            <tr>
                <th>R.B.</th>
                <th>NAZIV</th>
                <th>OPIS</th>
                <th>TIP</th>
                <th>CIJENA</th>
            </tr>
        </thead>

        <tbody class="resto">
            <tr>
                <td>1.</td>
                <td>Smart TV</td>
                <td>Dobar TV bas</td>
                <td>TV</td>
                <td>1000 KM</td>
            </tr>
            <tr class="parni">
                <td>2.</td>
                <td>HP Laptop</td>
                <td>Laptop znaci leti</td>
                <td>Laptopi</td>
                <td>1200 KM</td>
            </tr>
            <tr>
                <td>3.</td>
                <td>Ajfod</td>
                <td>Moze stat sto muzike</td>
                <td>Gadgeti</td>
                <td>100 KM</td>
            </tr>
            <tr class="parni">
                <td>4.</td>
                <td>Kuhalo za vodu</td>
                <td>Skuha sve cajeva</td>
                <td>Kucanski aparati</td>
                <td>120 KM</td>
            </tr>
        </tbody>

    </table>

</body>

</html>