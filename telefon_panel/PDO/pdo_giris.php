<?php
include_once('../dbislemler/baglan.php');
session_start();

if(isset($_POST['girisyap'])){

    $email=$_POST['email'];
    $sifre=$_POST['sifre'];
    
    $sorgu=$db->prepare("SELECT * FROM bayiler WHERE email=? and sifre=?");
    $sorgu->execute(array($email,$sifre));
    $islem=$sorgu->fetch();
    if($islem){
        $_SESSION['bayi_id']=$islem['bayi_id'];
        $_SESSION['email']=$islem['email'];
        $_SESSION['sifre']=$islem['sifre'];
        $_SESSION['ad']=$islem['ad'];
        header("location:../bayi/bayi-giris.php");
    }
    else{
        $sorgu=$db->prepare("SELECT * FROM musteriler WHERE email=? and sifre=?");
        $sorgu->execute(array($email,$sifre));
        $islem=$sorgu->fetch();
        if($islem){
            $_SESSION['musteri_id']=$islem['musteri_id'];
            $_SESSION['email']=$islem['email'];
            $_SESSION['sifre']=$islem['sifre'];
            $_SESSION['ad']=$islem['ad'];
            header("location:../musteri/musteri-siparis-ver.php");
        }
        else{
            echo "hatalı";
        }
    }
}
?>