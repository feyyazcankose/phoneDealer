<?php
include_once("../dbislemler/baglan.php");
if(!isset($_SESSION['email'])){
    header("location:../index.php");
}
else{
    include_once("bayi-siparis.php");
}
?>