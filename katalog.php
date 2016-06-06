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
    <script src="scripts/ajax.js"></script>
    <script src="scripts/script.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>


    <?php require 'bodyTag.php';
          include 'header.php'; ?>
    


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