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
    <script type="text/javascript" src="scripts/ajax.js"></script>
    <link rel="stylesheet" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css'>

</head>

<?php
require 'bodyTag.php';

 include 'header.php';
          if(isset($_REQUEST['delete']) and !empty($_REQUEST['delete']) and $_SESSION['loginSession'] == 'admin') {
              $idDel = $_REQUEST['delete'];
              require_once 'baza.php';
              $dajSliku = $baza->prepare("select slika from novosti where id_novosti=?");
              $dajSliku->bindValue(1, $idDel);
              $dajSliku->execute();
              $slika = $dajSliku->fetch();
              unlink($slika['slika']);
              $bris = $baza->prepare("delete from novosti where id_novosti = ?");
              $bris->bindValue(1, $idDel);
              $bris->execute();
          }
?>

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
          require "baza.php";
          if(isset($_REQUEST['autor']) and !empty($_REQUEST['autor'])) {
              $autorShow = $_REQUEST['autor'];
              require_once 'baza.php';
              $select = $baza->prepare("select id_novosti, autor, naslov, tekst, UNIX_TIMESTAMP(datum) objava, komentari, slika from novosti where autor = ?");
              $select->bindValue(1, $autorShow);
              $select->execute();
              while($novaNovost = $select->fetch()){
                  $tekst = implode(' ', array_slice(explode(' ', $novaNovost['tekst']), 0, 30));
                  $id=$novaNovost['id_novosti'];
                  print '<li class="news">
            <div class="one" style= "background-image: url('.$novaNovost['slika'].')"></div>
            <div id = "naslovNovosti" ><a class="naslovLink" href="detaljiNovosti.php?id='.$id.'">'.$novaNovost['naslov'].'</a></div>
            <div>'.$tekst.'<a class="naslovLink"  href="detaljiNovosti.php?id='.$id.'">(...)</a></div>
            <div class="objava">'.date("Y/m/d H:i:s", $novaNovost['objava']).'</div>
            <div class="objavaSpas">'.date("Y/m/d H:i:s", $novaNovost['objava']).'</div>
            <br/><br/><div id="infoNovosti" >Novost objavio/la: <a  href="index.php?autor='.$novaNovost['autor'].'" >'.$novaNovost['autor'].'</a></div>';
                  if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] == 'admin'){
                      echo '<br/><br/><div id="infoNovosti" ><a  href="index.php?delete='.$novaNovost['id_novosti'].'" >Obriši novost</a></div>';
                  }
                  echo '</li>';
              }
          } else{
              $select = $baza->prepare("select id_novosti, autor, naslov, tekst, UNIX_TIMESTAMP(datum) objava, komentari, slika from novosti");
              $select->execute();
              while($novaNovost = $select->fetch()){
                  $tekst = implode(' ', array_slice(explode(' ', $novaNovost['tekst']), 0, 30));
                  $id=$novaNovost['id_novosti'];
                  print '<li class="news">
            <div class="one" style= "background-image: url('.$novaNovost['slika'].')"></div>
            <div id = "naslovNovosti" ><a class="naslovLink" href="detaljiNovosti.php?id='.$id.'">'.$novaNovost['naslov'].'</a></div>
            <div>'.$tekst.'<a class="naslovLink"  href="detaljiNovosti.php?id='.$id.'">(...)</a></div>
            <div class="objava">'.date("Y/m/d H:i:s", $novaNovost['objava']).'</div>
            <div class="objavaSpas">'.date("Y/m/d H:i:s", $novaNovost['objava']).'</div>
            <br/><br/><div id="infoNovosti" >Novost objavio/la: <a  href="index.php?autor='.$novaNovost['autor'].'" >'.$novaNovost['autor'].'</a></div>';
                  if(isset($_SESSION['loginSession']) and $_SESSION['loginSession'] == 'admin'){
                      echo '<br/><br/><div id="infoNovosti" ><a  href="index.php?delete='.$novaNovost['id_novosti'].'" >Obriši novost</a></div>';
                  }
                  echo '</li>';
              }
          }
            ?>
        </ul>
    </body>
</html>