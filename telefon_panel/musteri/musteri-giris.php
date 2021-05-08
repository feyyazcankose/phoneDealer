<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:../index.php");
}
else{
    
    include_once("../head.php");
    ?>
    <link rel="stylesheet" href="../css/style.css">
    </head>
    <?php
    include_once("musteri.php");
    include_once("../footer.php");
}
?>