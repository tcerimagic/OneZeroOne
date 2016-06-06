<div class="logo">101
        <div class="logo-text">Tech Shop</div>
    </div>

    <?php
    date_default_timezone_set("Europe/Sarajevo");

    if(isset($_SESSION['loginSession'])){

        echo '<div id="loginInfo">Logovani ste kao: '.$_SESSION['loginSession'].' 
<br/><br/>Broj nepročitanih komentara: <span id="notifikacije"></span></div>';
   //     echo '<div id="loginInfo"></div>';

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
                        <a href="index.php?autor='.$_SESSION['loginSession'].'" class="button">Moje novosti</a>
                    </li>
                    <li class="flex-item">
                        <a href="novosti.php" class="button">Dodaj novost</a>
                    </li>');
        if($_SESSION['loginSession'] == "admin"){
        print('<li class="flex-item">
                    <a href="autori.php" class="button">Autori</a>
               </li>');
        }

        print('<li class="flex-item">
        <a href="password.php" class="button">Promijeni šifru</a>
         </li>');

        print('<li class="flex-item">
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
