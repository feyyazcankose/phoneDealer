<?php
include_once("../dbislemler/baglan.php");
session_start();    
if(isset($_POST['stok'])){
    $bayi=$_SESSION['bayi_id'];
    $adet=$_POST['adet'];
    $telefon=$_POST['telefon'];

    $verisor=$db->query("SELECT bayi_id, telefon_id FROM stoklar ",PDO::FETCH_ASSOC);
    $x=0;
    foreach($verisor as $yaz){
       if($yaz['bayi_id']==$bayi && $yaz['telefon_id']==$telefon){
           echo "Kayıt mevcut!";
           $x=1;
       }
   }
   if($x==0){
            $ekle=$db->exec("INSERT INTO stoklar (bayi_id,telefon_id,stok_miktari) VALUES ('$bayi','$telefon','$adet')");
            if($ekle){
                header("location:bayi-stok.php");
            }
            else{
                echo "hata var!";
            }
   }
    
   
}
    
?>