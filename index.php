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
    <title>Naslovnica</title>
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

    <ul class="flex-container-posts wrap">
        <li class="banner"></li>
        <li class="first-column"></li>
    </ul>
    <div class="heading">Iz ponude izdvajamo</div>
    <select id="filter" onchange="filtrirajProizvode()">
						  <option value="sve">Prikazi sve</option>
						  <option value="danas">Danasnje</option>
						  <option value="sedmica">Sedmicne</option>
						  <option value="mjesec">Mjesecne</option>
						</select>

    <ul class="flex-container-posts wrap">


        <?php
        $file = fopen("data/novostiData.csv", "r");

        $novostiArray = array();
        while(($csvNovost = fgetcsv($file, 0, ";")) !== false){
        
            print '<li class="news">
            <div class="one" style= "background-image: url('.$csvNovost[2].')"></div>
            <div id = "naslovNovosti" >'.$csvNovost[0].'</div>
            <div>'.$csvNovost[1].'</div>
            <div class="objava">'.$csvNovost[3].'</div>
            <div class="objavaSpas">'.$csvNovost[3].'</div>
        </li>';

        }
            
            
            ?>





        <!--<li class="news">
            <div class="one" style= 'background-image: url("slike/img1.jpg")' ></div>
            <div>

            </div>
            <div class="objava">sdadas</div>
            <div class="objavaSpas"></div>
        </li>-->



       




    </ul>

</body>

</html>