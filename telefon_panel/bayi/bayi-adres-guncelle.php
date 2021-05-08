<?php include_once("bayi_include.php");
      include_once("../function/guncelle_kaydet.php");

      $table_ad="adresler";
      $donus=getTableName($table_ad,$db);
      $ad_dizi=$donus[0];
      $id_ad=$donus[1];

      
?>

<section style="margin-left: 300px;">
    <div class="container text-agin">
        <?php
                if(isset($_POST['guncelle'])){
                    $dizi=$_POST;
                    if(tableGuncelle($table_ad,$db,$dizi)){
                        ?>
                        <div class="alert alert-danger mt-5">
                            Adresiniz Başarılı bir şekilde güncellendi.
                         </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="alert alert-danger mt-5">
                                Teknik Bir Sorun Yaşıyoruz.
                         </div>
                        <?php
                    }
                }
        ?>
        <div class="row">
        <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Adres Bilgilerimi Güncelle</h3>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-12">
                        <div class="card mx-3">
                            <div class="card-header pb-in">
                                <h4>Adres Bilgileri</h4>
                            </div>
                        <div class="card-body pb-in">
                        <form action="" method="POST">
                            <?php
                                $bayi=$_SESSION['bayi_id'];
                                $adres_id=$db->query("SELECT adres_id FROM bayiler where bayi_id='$bayi'");
                                foreach($adres_id as $adresid){}
                                $adres_id=$adresid[0];
                                $adres=$db->query("SELECT * FROM adresler WHERE adres_id ='$adres_id'");
                                foreach($adres as $a){ }
                                ?>
                                <h6 class="text-muted font-semibold mt-3">Mahalle</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['mahalle']?>" name="mahalle">
                                
                                <h6 class="text-muted font-semibold mt-3">Sokak</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['sokak']?>" name="sokak">

                                <h6 class="text-muted font-semibold mt-3">Cadde</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['cadde']?>" name="cadde">

                                <h6 class="text-muted font-semibold mt-3">No</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['no']?>" name="no">

                                <h6 class="text-muted font-semibold mt-3">İlçe</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['ilçe']?>" name="ilçe">
                                
                                <h6 class="text-muted font-semibold mt-3">İl</h6>
                                <input type="text" class="form-control" placeholder="<?php echo $a['il']?>" name="il">
                                
                                <button class="btn btn-primary mt-3" name="guncelle">Adres Güncelle</button>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include_once("../footer.php");
?>