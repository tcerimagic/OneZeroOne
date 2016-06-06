<?php
if(isset($_REQUEST['logoutBtn'])){

    session_start();
    unset($_SESSION['loginSession']);
}
else {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Unos novosti</title>
    <script src="scripts/script.js"></script>
    <script src="scripts/validacijeScript.js"></script>
    <script src="scripts/ajax.js"></script>

    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>
</head>

    <?php
    require 'bodyTag.php';

    date_default_timezone_set("Europe/Sarajevo");
        if(isset($_POST['naslovNovosti']) && isset($_POST['tekstNovosti']) && isset($_FILES['slikaNovosti'])){
            if(!empty($_POST['naslovNovosti']) && !empty($_POST['tekstNovosti']) && !empty($_FILES['slikaNovosti'])){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                    $image_file = 'slikeNovosti/'.basename($_FILES['slikaNovosti']['name']);
                    $uploadOk = 1;
                    $image_file_type = pathinfo($image_file, PATHINFO_EXTENSION);

                    //provjera slike
                    if(isset($_POST['submit'])){
                        $check = getimagesize($_FILES['slikaNovosti']['tmp_name']);

                        if($check !== false){
                            $uploadOk = 1;
                        }
                        else {
                            echo "<div id='obavjestenje2'>Fajl koji ste izabrali nije slika.</div>";
                            $uploadOk = 0;
                        }
                    }
                    //provjeri format slike
                    if($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg"
                && $image_file_type != "gif" ) {
                        echo "<div id='obavjestenje2'>Odabrana slika je nedozvoljenog formata.</div>";
                        $uploadOk = 0;
                    }

                    //provjeri velicinu
                    if($_FILES['slikaNovosti']['size'] > 500000) {
                        echo "<div id='obavjestenje2'>Slika je prevelika.</div>";
                        $uploadOk = 0;
                    }

                    //da li postoji vec?
                    if(file_exists($image_file)){
                        echo "<div id='obavjestenje2'>Odabrana slika postoji.</div>";
                        $uploadOk = 0;
                    }
                    

                    if($uploadOk === 0){
                        echo "<div id='obavjestenje2'>Greska pri objavljivanju slike.</div>";

                    }
                    else{
                        if (move_uploaded_file($_FILES["slikaNovosti"]["tmp_name"], $image_file)) {

                            $tekstNovosti = str_replace(PHP_EOL, "</br>",  $_POST['tekstNovosti']);
                            $slika = ('slikeNovosti/'.basename($_FILES['slikaNovosti']['name']));

                            if(isset($_POST['komentarisanje'])){
                                $komentari = 'da';

                            }else { $komentari = 'ne'; }

                            require 'baza.php';

                            $insert = $baza->prepare("insert into novosti (autor, naslov, tekst, datum, komentari, slika) values (?, ?, ?, ?, ?, ?) ");
                            if(!$insert->execute(array($_SESSION['loginSession'], $_POST['naslovNovosti'], $tekstNovosti, date_format(new DateTime(), 'Y/m/d H:i:s'), $komentari , $slika))){
                                echo "Novost nije objavljena.";
                                //$err = $insert->errorInfo();
                                //foreach($err as $e){
                                //    echo $e;
                                //}

                            }
                            else {
                                print "<div id='obavjestenje1'>Novost objavljena!</div>";
                            }

                        }


                    }


                }
            }
        }
        
        
        
    ?>


    <?php include 'header.php'; ?>

    <h1 class="center">Forma za unos novosti</h1>
   

    <form id="forma" method="post" action="novosti.php" enctype="multipart/form-data" >
        <div class="naslov-forma">DODAJ NOVOST</div>

        <input placeholder="Naslov novosti" type="text" id="naslovNovosti" name="naslovNovosti">

        <label for="slikaNovosti">Dodaj sliku:</label>
        <input type="file" id="slikaNovosti" name="slikaNovosti" accept="image/*" >
 
        <textarea placeholder="Tekst novosti" name="tekstNovosti" required></textarea>


        <!--ajax-->
        <input placeholder="Dvoslovni kod države" type="text" id="dvoslovniKod" name="dvoslovniKod" />
        <input placeholder="Pozivni" type="text" id="pozivni" name="pozivni" onblur="provjeriKod()" required />
        <input placeholder="Broj telefona" type="text" id="telefon" name="telefon" required />
        <label id="labelaGreske" name="labelaGreske"></label>

        <label for="slikaNovosti">Dodaj sliku:</label>
        <input type="checkbox" id="komentarisanje" name="komentarisanje" checked />Dozvoljeni komentari



        <button type="submit" class="gumb-centar">Dodaj</button>
   
    
    
     </form>
</body>
</html>