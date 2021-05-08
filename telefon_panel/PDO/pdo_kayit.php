<?php
include_once('baglan.php');
if (isset($_POST['kayitol']))
{
    $email=$_POST['email'];
    $ad=$_POST['ad'];
    $soyad=$_POST['soyad'];
    $yetki=$_POST['yetki'];
    $sifre=$_POST['sifre'];

    if($yetki==1){

        $ekle=$db->prepare("INSERT INTO bayiler SET ad=? , email=?,sifre=?,kullanici_tip_id=?,adres_id=?");
        $ekle->execute([$ad,$email,$sifre,$yetki,"1"]);
        if($ekle){

            header("location:../index.php");
        }
        else{
            echo "kayıt başarısız";
        }    
        
    }
    else if($yetki==2){

        $ekle=$db->prepare("INSERT INTO musteriler SET ad=? ,soyad=?, email=?,sifre=?,kullanici_tip_id=?,telefon_no=?,adres_id=?");
        $ekle->execute([$ad,$soyad,$email,$sifre,$yetki,"1","1"]);
        if($ekle){
            
            header("location:../musteri-giris.php");
        }
        else{
            echo "kayıt başarısız";
        }  
        

    }
 
}


?>