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
    <meta charset="UTF-8" />
    <title>O nama</title>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/script.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css' />
</head>


    <?php require 'bodyTag.php';
          include 'header.php'; ?>

    <ul class="flex-container-posts wrap">
        <li class="onama-wrap">
 <?php

    


// detalji novosti GLAVNI DIO:
     if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
        
             $idN = $_REQUEST['id'];

             require 'baza.php';





             if(isset($_REQUEST['odobriKomentare']) and $_REQUEST['odobriKomentare'] === 'da' and $_SESSION['loginSession'] === 'admin'){
                 $nemamViseIdejeZaIme = $baza->prepare("update novosti set komentari = 'da' where id_novosti = $idN");
                 $nemamViseIdejeZaIme->execute();

             }
             
             //upisi komentar u bazu
             if(isset($_POST['komentarisiBtn']) and isset($_POST['komentar'])){
                
                 $komentarInsert = $_POST['komentar'];
                 $autorKomentaraInsert = 'gost';
                 if(isset($_SESSION['loginSession'])){
                     $autorKomentaraInsert = $_SESSION['loginSession'];
                 }

                 $insertKomentar = $baza->prepare("insert into komentari (autor, tekst, novost) values (?,?,?)");
                 $insertKomentar->bindValue(1, $autorKomentaraInsert);
                 $insertKomentar->bindValue(2, $komentarInsert);
                 $insertKomentar->bindValue(3, $idN);

                 $insertKomentar->execute();
                
                 

                
             }
             //upisi odgovor u bazu
             if(isset($_POST['odgovoriBtn']) and isset($_POST['odgovor'])){
                 $odgovorInsert = $_POST['odgovor'];
                 $autorOdgovoraInsert = 'gost';
                 if(isset($_SESSION['loginSession'])){
                     $autorOdgovoraInsert = $_SESSION['loginSession'];
                 }
                 $idKomentaraOsnovnog = $_POST['odgovoriBtn'];

                 $insertOdgovor = $baza->prepare("insert into odgovori (autor, tekst, komentar) values (?,?,?)");
                 $insertOdgovor->bindValue(1, $autorOdgovoraInsert);
                 $insertOdgovor->bindValue(2, $odgovorInsert);
                 $insertOdgovor->bindValue(3, $idKomentaraOsnovnog);
                 $insertOdgovor->execute();

             }

             //prikazi detaljno novost
             $sel = $baza->prepare("select autor, naslov, tekst, UNIX_TIMESTAMP(datum) objava, komentari, slika from novosti where id_novosti= ? ");
             $sel->execute(array($idN));

             $novost = $sel->fetch();

             $autor = $novost['autor'];
             $naslov = $novost['naslov'];
             $tekst= $novost['tekst'];
             $objava = $novost['objava'];
             $komentarisanje = $novost['komentari'];
             $slika = $novost['slika'];


             echo '<div class="onama" style="background-image: url(\''.$slika.'\');"></div>
                <h1 class="center">'.$naslov.'</h1>
            <div>'.$tekst.'</div>
            <div class="objava">'.date("Y/m/d H:i:s", $objava).'</div>
         <br/><br/><div id="infoNovosti" >Novost objavio/la: <a  href="index.php?autor='.$autor.'" >'.$autor.'</a></div>';
             
             if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] == 'admin'
                 ){
                     echo '<br/><br/><div id="infoNovosti" ><a  href="index.php?delete='.$novaNovost['id_novosti'].'" >Obriši novost</a></div>';

                 }

             echo ' </li><li>
            <h1>Komentari:<br/></h1>
        </li>';

             if(isset($_REQUEST['obrisiKomentar']) and $_SESSION['loginSession'] === 'admin'){
                 $brisanjeKomentara = $baza->prepare("delete from komentari where id_komentara = ?");
                 $brisanjeKomentara->bindValue(1, $_REQUEST['obrisiKomentar']);
                 $brisanjeKomentara->execute();
             }


             //prikazi komentare

             $kom = $baza->prepare("select * from komentari k where k.novost = $idN");
             $kom->execute();

             //ako nema komentara
             if($kom->rowCount === 0){
                 echo "<li class='onama-wrap komentari-wrap'>Nema komentara.</li>";
             }
             //ako ima komentara
             else{
                 while($komentar = $kom->fetch()){
                     
                     $idKomentara = $komentar['id_komentara'];
                     $autorKomentara = $komentar['autor'];
                     $tekstKomentara = $komentar['tekst'];


                     if(isset($_SESSION['loginSession']) and $autor == $_SESSION['loginSession']){
                         $procitani = $baza->prepare("update komentari set procitan = 'da' where novost=".$idN." and id_komentara=".$idKomentara);
                         $procitani->execute();
                     }



                     echo '<li class="onama-wrap komentari-wrap">

                <a href="index.php?autor='.$autorKomentara.'">'.$autorKomentara.'</a>
            <div>'.$tekstKomentara.'
            </div>';

                     if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] === 'admin'){
                         echo '</br><a href="detaljiNovosti.php?id='.$idN.'&obrisiKomentar='.$idKomentara.'" >Obriši komentar</a></br>';
                     }


             //brisanje odgovora
                     if(isset($_REQUEST['obrisiOdgovor']) and $_SESSION['loginSession'] === 'admin'){
                         $brisanjeKomentara = $baza->prepare("delete from odgovori where id_odgovora = ?");
                         $brisanjeKomentara->bindValue(1, $_REQUEST['obrisiOdgovor']);
                         $brisanjeKomentara->execute();
                     }

             //prikazi odgovore
                $odg = $baza->prepare("select * from odgovori where komentar = '$idKomentara'");
                $odg->execute();
                
                echo '<br/><ul>';
                while($odgovor = $odg->fetch()){
                    $autorOdgovora = $odgovor['autor'];
                    $tekstOdgovora = $odgovor['tekst'];

                    echo
                    '</br></br><li class="onama-wrap odgovori-wrap">
                    <a href="index.php?autor='.$autorOdgovora.'">'.$autorOdgovora.'</a>
                        <div>'.$tekstOdgovora.'</div>';
                    
                    if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] === 'admin'){
                        echo '</br><a href="detaljiNovosti.php?id='.$idN.'&obrisiOdgovor='.$odgovor['id_odgovora'].'" >Obriši odgovor</a></br>';
                     }

                    echo '</li>';
                }

             //prikazi formu za unos odgovora
                echo '<br/><br/><li class="onama-wrap odgovori-wrap">

<form id="komentariForm" method="post" action="#">
                 <textarea id="odgovor" class="textareaKomentar" name="odgovor" required></textarea>
                  <button type="submit" class="gumb-centar" id="odgovoriBtn" name="odgovoriBtn" value="'.$idKomentara.'">Odgovori</button>
                 </form>

                </li></ul>';


                echo '</li>';

                 }


                 

                 //prikazi formu za unos komentara
                 if($komentarisanje === 'da'){

                     echo '<li class="onama-wrap komentari-wrap komentar-forma">
                 <form id="komentariForm" method="post" action="#">
                    
                  <textarea id="komentar" class="textareaKomentar"  name="komentar" required></textarea>

                  <button type="submit" class="gumb-centar" id="komentarisiBtn" 
                                name="komentarisiBtn" value=" ">Pošalji</button>
                </form>
                 </li>';
                 }
                 else{
                     echo "<li class='onama-wrap komentari-wrap'>Nije dozvoljeno komentarisanje ove novosti.</li>";
                     
                     if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] === 'admin'){
                         echo "</br></br><a href='detaljiNovosti.php?id=$idN&odobriKomentare=da'>  Odobri komentarisanje</a>";
                     } 
                 }

             }



         }


 ?>


          

    </ul>

</body>

</html>
