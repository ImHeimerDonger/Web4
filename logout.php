<?php
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["id"]);
    header("HTTP/1.1 301 Moved Permanently");
    header("Location:".$address_site."/index.php");
?>