<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kontakt</title>
    <script src="scripts/script.js"></script>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/validacijeScript.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>


    <?php require 'bodyTag.php';

    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['loginBtn'])){

        $username = $_POST['username'];
        $uneseniPassword = md5($_POST['password']);

        require 'baza.php';
        $obj = $baza->prepare("select username from autori where username = ? and password = ?");
        $obj->bindValue(1, $username);
        $obj->bindValue(2, $uneseniPassword);


        
        if(!$obj->execute()){
            echo "nestoo";
        } else{
            if($obj->rowCount()==1){
            $_SESSION['loginSession'] = $username;

            }
           
            
            }
        }

    include 'header.php';

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