<?php
    session_start();
?>
<!DOCTYPE html>
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

    <?php
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['loginBtn'])){

            $filename = "data/loginData.txt";
            $myfile = fopen($filename, "r") or die("Greska pri otvaranju datoteke");
            $loginData = explode(',', fread($myfile, filesize($filename)));
            fclose($myfile);

            $userPassword = trim($loginData[1]);

            $uneseniPassword = md5($_POST['password']);

            if($userPassword === $uneseniPassword){
                $user = $_POST['username'];
                $_SESSION['loginSession'] = $user;
            }
            else{
                echo "Neispravni login podaci!";
            }

        }


    ?>


    <div class="logo">
        101
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
    
    
    <?php
        if(isset($_SESSION['loginSession'])){

            echo '<form id="forma" action="index.php" >
        <div class="naslov-forma">LOGOVANI STE!</div>

        <button type="submit" class="gumb-centar">Nastavi</button>
    </form>';
        
        }
        else{
            echo '<form id="forma" method="post" action="loginPage.php" >
        <div class="naslov-forma">LOGIN</div>

        <input placeholder="Username" type="text" id="username" name="username">

        <input placeholder="Password" type="password" id="password" name="password" >

        <button type="submit" class="gumb-centar" id="loginBtn" name="loginBtn" >Login</button>
    </form>';
     
        }
      
        ?>
   

</body>
</html>