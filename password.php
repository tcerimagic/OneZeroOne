<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Kontakt</title>
    <script src="scripts/script.js"></script>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/validacijeScript.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css' />
</head>


    <?php
    require 'bodyTag.php';

    include 'header.php';

    if(isset($_POST['stariPass']) && !empty($_POST['stariPass']) && isset($_POST['noviPass']) && !empty($_POST['noviPass']) && isset($_POST['ponovniPass']) && !empty($_POST['ponovniPass']) && isset($_POST['loginBtn'])){


        $stari = md5($_POST['stariPass']);
        $novi = md5($_POST['noviPass']);

        $user = $_SESSION['loginSession'];

        require 'baza.php';
        $obj = $baza->prepare("select username from autori where username = ? and password = ?");
        $obj->bindValue(1, $user);
        $obj->bindValue(2, $stari);

        if(!$obj->execute()){
            echo "<div id='obavjestenje2'>Error</div>";
        } else{
            if($obj->rowCount()==1){

                $upd = $baza->prepare("update autori set password = ? where username = ?");
                $upd->bindValue(1, $novi);
                $upd->bindValue(2, $user);

                if($upd->execute()){
                    echo '<form id="forma" action="index.php" >
                            <div class="naslov-forma">PASSWORD PROMIJENJEN!</div>

                            <button type="submit" class="gumb-centar">Nastavi</button>
                        </form>';
                }

            }
            else {
                echo "<div id='obavjestenje2'>Unesena trenutna šifra nije ispravna.</div>";
            }


        }
    }

   else{
        echo '<form id="forma" method="post" action="password.php" >
        <div class="naslov-forma">PROMJENA PASSWORDA</div>

        <input placeholder="Stari password" type="password" id="stariPass" name="stariPass" required>

        <input placeholder="Novi password" type="password" id="noviPass" name="noviPass" onblur="provjeriNove()" required >
        <input placeholder="Ponovite novi password" type="password" id="ponovniPass" onblur="provjeriNove()" name="ponovniPass" required >
        <label id="labelaGreske"></label><br/>
        <button type="submit" class="gumb-centar" id="loginBtn" name="loginBtn" onsubmit="provjeriNove()" >Potvrdi</button>
    </form>';
    }

    ?>


</body>
</html>
