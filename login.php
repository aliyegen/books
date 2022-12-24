<?php
        require_once "user.php";
        $userName = $_POST['userName'];
        $passW = ($_POST['passWord']);

        $u = new user();

        $u->login($userName, $passW);
?>