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
    <title>Katalog</title>
    <script src="scripts/ajax.js"></script>
    <script src="scripts/script.js"></script>
    <link rel="stylesheet" href="style.css" />
    <link href='http://fonts.googleapis.com/css?family=Merienda+One' rel='stylesheet' type='text/css' />
</head>


    <?php 
    require 'bodyTag.php';
    include 'header.php'; ?>



    <h1 class="center">Autori:</h1>
<?php
            require 'baza.php';

            if(isset($_POST['editBtn']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['naziv']) && !empty($_POST['naziv']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && $_SESSION['loginSession'] == 'admin'){
               
                $pw = md5($_POST['password']);
                $naz = $_POST['naziv'];
                $em = $_POST['email'];
                $un = $_POST['username'];

                $save = $baza->prepare("update autori set password = ?, naziv = ?, email = ? where username = ?");
                $save->bindValue(1, $pw);
                $save->bindValue(2, $naz);
                $save->bindValue(3, $em);
                $save->bindValue(4, $un);


               if(!$save->execute())
               {
                   $rrr = $save->errorInfo();
                   foreach($rrr as $r){
                       echo $r;
                   }
               }


            }

            else if(isset($_POST['spasiBtn']) && isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['naziv']) && !empty($_POST['naziv']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && $_SESSION['loginSession'] == 'admin'){

                $un = $_POST['username'];
                $pw = md5($_POST['password']);
                $naz = $_POST['naziv'];
                $em = $_POST['email'];

                $save = $baza->prepare("insert into autori (username, password, naziv, email) values (?, ?, ?, ?) ");
                $save->bindValue(1, $un);
                $save->bindValue(2, $pw);
                $save->bindValue(3, $naz);
                $save->bindValue(4, $em);


               $save->execute();

            }

            else if (isset($_REQUEST['delete']) && !empty($_REQUEST['delete']) && $_SESSION['loginSession'] == 'admin'){
                $brisi = ($_REQUEST['delete']);

                $save = $baza->prepare("delete from autori where username = ?");
                $save->bindValue(1, $brisi);
                $save->execute();
                    
            }


            $obj = $baza->prepare("select username, naziv, email from autori");

            if(!$obj->execute()){
            print "<div id='obavjestenje2'>Error pri interakciji s bazom</div>";
        } else{
            print "<table>
        <thead class='head'>
            <tr>
                <th>USERNAME</th>
                <th>NAZIV</th>
                <th>EMAIL</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
          </thead>
            <tbody class='resto'>";
            
            while($red = $obj->fetch()){
                print " <tr>
                <td>".$red['username']."</td>
                <td>".$red['naziv']."</td>
                <td><a href='mailto:".$red['email']."' >".$red['email']."</a></td>
                <td><a href='autori.php?edit=".$red['username']."'>edit</a></td>
                <td><a href='autori.php?delete=".$red['username']."'>delete</a></td>
            </tr>";

            }
            print "</tbody>
                    </table>";
            
        }

        if(isset($_REQUEST['edit']) && !empty($_REQUEST['edit']) && $_SESSION['loginSession'] == 'admin'){
            
            $autor = $_REQUEST['edit'];

            
        $obj = $baza->prepare("select naziv, password, email from autori where username = ?");
        $obj->bindValue(1, $autor);
        $obj->execute();
        $rezultat = $obj->fetch();


        print '<br/><hr/><br/><form id="forma" method="post" action="autori.php" >
        <div class="naslov-forma">PODACI O AUTORU: '.$autor.'</div>

        <input placeholder="Username" type="hidden" id="username" name="username" value="'.$autor.'" >
        <input placeholder="Password" type="password" id="password" name="password" value="'.$rezultat['password'].'" >
        <input placeholder="Naziv autora" type="text" id="naziv" name="naziv" value="'.$rezultat['naziv'].'" >
        <input placeholder="Email" type="text" id="email" name="email" value="'.$rezultat['email'].'" >
        <label id="labelaGreske"></label><br/>
        <button type="submit" class="gumb-centar" id="editBtn" name="editBtn" value=" " >Spasi</button>
    </form>';
        
        } else{
            print '<br/><hr/><br/><form id="forma" method="post" action="autori.php" >
        <div class="naslov-forma">PODACI O NOVOM AUTORU</div>

        <input placeholder="Username" type="text" id="username" name="username">
        <input placeholder="Password" type="password" id="password" name="password" >
        <input placeholder="Naziv autora" type="text" id="naziv" name="naziv" >
        <input placeholder="Email" type="text" id="email" name="email" >
        <label id="labelaGreske"></label><br/>
        <button type="submit" class="gumb-centar" id="spasiBtn" name="spasiBtn" value=" " >Spasi</button>
    </form>';

        }

?>
    

</body>

</html>
