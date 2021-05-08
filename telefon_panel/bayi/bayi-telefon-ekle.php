<?php include_once("bayi_include.php");
      include_once("../function/guncelle_kaydet.php");
      $table_name="telefonlar";
      $donus=columsAd($table_name,$db);
      $adDizi=$donus[0];//ad
      $valueDizi=$donus[1];//Düzgün hali

?>
<section style="margin-left: 300px;">
    <!--Başlık-->
    <div class="container text-agin">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Telefon Ekle</h3>
                </div>

            </div>
        </div>
        <?php
            if(isset($_POST['telefon_ekle'])){
                    $bayi=$_SESSION['bayi_id'];
                    $marka=$_POST['marka'];
                    $model=$_POST['model'];
                    $isletim_sistemi=$_POST['isletim_sistemi'];
                    $ekran_boyutu=$_POST['ekran_boyutu'];
                    $agirlik=$_POST['agirlik'];
                    $kamera=$_POST['kamera'];
                    $depolama=$_POST['depolama'];
                    $bellek=$_POST['bellek'];
                    $yonga_seti=$_POST['yonga_seti'];
                    $islemci_frikans=$_POST['islemci_frikans'];
                    $ekran_cozunurlugu=$_POST['ekran_cozunurlugu'];
                    $video_kayit=$_POST['video_kayit'];
                    $batarya_kapasitesi=$_POST['batarya_kapasitesi'];
                    $sar_degeri=$_POST['sar_degeri'];
                    $fiyat=$_POST['fiyat'];

                    if($db->exec("INSERT INTO telefonlar (bayi_id,marka,model,isletim_sistemi,ekran_boyutu,agirlik,kamera_cozunurlugu,dahili_depolama,bellek,yonga_seti,işlemci_frekansi,ekran_cozunurlugu,video_kayit_cozunurlugu,batarya_kapasitesi,sar_degeri,fiyat) VALUES ('$bayi','$marka','$model','$isletim_sistemi','$ekran_boyutu','$agirlik','$kamera','$depolama','$bellek','$yonga_seti','$islemci_frikans','$ekran_cozunurlugu','$video_kayit','$batarya_kapasitesi','$sar_degeri','$fiyat')"))
                    {
                        ?>
                        <div class="alert alert-success ">
                           <?php echo $marka.' '.$model ?> Telefonu eklenmiştir.
                       </div>
   
                       <?php
                    }
                    else{
                        ?>
                        <div class="alert alert-danger">
                           <span>Bir sorun ile karşılaştık en kısa sürede çözüm yapılacaktır.</span>
                        </div>
   
                       <?php
                    }
            }
        ?>
      
        <div class="row ">
            <div class="col-12">
                <div class="card mx-3">
                    <div class="card-header pb-in">
                        <h4>Telefon Bilgileri</h4>
                    </div>
                    <div class="card-body pb-in">
                        <form action="" method="POST" >

                            <?php
                                for ($i=2; $i<count($valueDizi)-1 ; $i++) { 
                                    ?>
                                        <h6 class="text-muted font-semibold mt-3"><?php echo $valueDizi[$i]?></h6>
                                        <input type="text" class="form-control" placeholder="" name="<?php echo $adDizi[$i]?>">
                                    <?php
                                }
                            ?>
                            <button class="btn btn-primary mt-3" name="telefon_ekle">Telefon Ekle</button>
                        </form>
                    </div>
                </div>
                            
            </div>
        </div>

        
    </div>
</section>

<?php 
include_once("../footer.php");
?>

<section>
    
</section>