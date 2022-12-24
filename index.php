<?php
    require("user.php"); 
  
    $u = new user();
    $u->isSession();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            require_once("static/head.html");
        ?>
    </head>
    <body>
        <?php
            require_once("static/nav.php");
        ?>
    </body>
</html>