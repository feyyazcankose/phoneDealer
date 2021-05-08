<?php include_once("bayi_include.php");$kontrol=0;
include_once("../function/guncelle_kaydet.php");
$table_name="bayi_calisanlari";
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
                        <h3>Çalışan Ekle</h3>
                </div>

            </div>
        </div>
      
        <?php
            if(isset($_POST['telefon_ekle'])){
                $tc=$_POST['tc'];
                $bayi=$_SESSION['bayi_id'];
                    $ad=$_POST['ad'];
                    $soyad=$_POST['soyad'];
                    $email=$_POST['email'];
                    $tel=$_POST['tel'];
                    $gorev=$_POST['gorev'];
                    $maas=$_POST['maas'];
                    if($db->exec("INSERT INTO bayi_calisanlari  (tc,bayi_id,ad,soyad,email,telefon_no,gorev,maas) VALUES ('$tc','$bayi','$ad','$soyad','$email','$tel','$gorev','$maas') "))
                    {
                        ?>
                        <div class="alert alert-success ">
                           <?php echo $tc?> TC Kimlik numaralı çalışanınız bayinize eklenmiştir.
                       </div>
   
                       <?php
                    }
                    else{
                        ?>
                        <div class="alert alert-danger">
                           <span>Bir sorun ile karşılaştık en kısa sürede çözüm yapılacaktır.</span>
                           <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
   
                       <?php
                    }
               
            }
        ?>
        <div class="row">
       
            <div class="col-12">
                <div class="card mx-3">
                    <div class="card-header pb-in">
                        <h4>Çalışan Bilgileri</h4>
                    </div>
                    <div class="card-body pb-in">
                    <form action="" method="POST" >
                            <?php
                                for ($i=0; $i<count($valueDizi) ; $i++) { 
                                    if($i!=1){
                                    ?>
                                      
                                        <h6 class="text-muted font-semibold mt-3"><?php echo $valueDizi[$i]?></h6>
                                        <input type="text" class="form-control" placeholder="" name="<?php echo $adDizi[$i]?>">
                                    <?php
                                 } }
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