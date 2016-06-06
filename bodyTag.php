<?php
if(isset($_SESSION['loginSession'])){
    echo '
<body onload="provjeriNotifikacije(\''.$_SESSION['loginSession'].'\'); obaviSve();">
    ';
}
else{
    echo '<body>
        ';
}

?>