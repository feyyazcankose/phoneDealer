<?php
    include_once("dbislemler/baglan.php");
    session_start();
    unset($_SESSION["email"]);
    header("location:index.php");
?>