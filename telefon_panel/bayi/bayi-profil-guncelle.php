<?php include_once("bayi_include.php");
      include_once("../function/guncelle_kaydet.php");

      $table_ad="bayiler";
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
                        if($_POST['ad']!=''){
                            $_SESSION['ad']=$_POST['ad'];
                        }
                        ?>
                        <div class="alert alert-danger mt-5">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                            </span> 
                            Profil Başarılı bir şekilde güncellendi.
                         </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="alert alert-danger mt-5">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                            </span> 
                                Teknik Bir Sorun Yaşıyoruz.
                         </div>
                        <?php

                    }

                }
                     
               
        ?>
        <div class="row">
        <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Profil Bilgilerimi Güncelle</h3>
                </div>
            </div>
        </div>
        <div class="row">
                    <div class="col-12">
                        <div class="card mx-3">
                            <div class="card-header pb-in">
                                <h4>Profil Bilgileri</h4>
                            </div>
                        <div class="card-body pb-in">
                            <form action="" method="POST">
                                <?php
                                $profil=$db->query("SELECT * FROM bayiler");
                                $p='';
                                foreach($profil as $p){}
                                $AdValue=columsAd($table_ad,$db);
                                $ad=$AdValue[0];
                                $value_dizi=$AdValue[1];
                                for($i=0;$i<count($ad);$i++){
                                    if($i==1||$i==2||$i==4){
                                ?>
                                <h6 class="text-muted font-semibold mt-3"><?php echo $value_dizi[$i];?></h6>
                                <input type="text" class="form-control" placeholder="<?php echo $p[$i]?>" name="<?php echo $ad[$i]?>">
                                <input type="hidden" value="<?php echo $p['bayi_id']?>" name="id">
                                <?php }}?>
                                <button class="btn btn-primary mt-3" name="guncelle">Profili Güncelle</button>
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