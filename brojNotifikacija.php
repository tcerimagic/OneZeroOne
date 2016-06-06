<?php

require 'baza.php';

if(isset($_GET['username']) and !empty($_GET['username'])){

    $notifikacije = $baza->prepare("select * from komentari kom, novosti nov where nov.id_novosti = kom.novost and nov.autor = ? and kom.procitan = 'ne'");

    $notifikacije->execute(array( $_GET['username']));

    $brojNovih = $notifikacije->rowCount();

    print($brojNovih);

}

?>