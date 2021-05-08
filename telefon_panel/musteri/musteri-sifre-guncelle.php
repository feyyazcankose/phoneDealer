<?php include_once("musteri_include.php")?>

<section style="margin-left: 300px;">
    <div class="container text-agin">
        
        <?php
                if(isset($_POST['sifre'])){
                    ?>
                        <div class="alert alert-danger mt-5">
                    <?php
                    $musteri_id=$_SESSION['musteri_id'];
                    $ys1=$_POST['y1password'];
                    if($ys1==$_POST['y2password']){
                        $es=$_POST['epassword'];
                        $sifre=$db->query("SELECT sifre FROM musteriler WHERE musteri_id=$musteri_id");
                        $p='';
                        foreach($sifre as $p){ }
                        if($es==$p['sifre']){
                            $sifre_guncel=$db->exec("UPDATE musteriler SET sifre='$ys1' WHERE musteri_id='$musteri_id'");
                            if($sifre_guncel){
                                echo "Şifreniz Güncellenmiştir.";
                            }
                        }   
                        else{
                            echo "Eski Şifreniz Hatalı!".' '.$musteri_id;
                        }
                    }
                    else{
                        echo "Yeni girilen sifreler aynı degil!";
                    }
                }
                ?>
                </div>
                <?php
            ?>

        <div class="row">
        <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Şifre Bilgilerimi Güncelle</h3>
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


                                <h6 class="text-muted font-semibold mt-3">Eski Şifre</h6>
                                <input type="password" class="form-control" placeholder="" name="epassword" required >

                                <h6 class="text-muted font-semibold mt-3">Yeni Şifre</h6>
                                <input type="password" class="form-control" placeholder="" name="y1password" required >

                                
                                <h6 class="text-muted font-semibold mt-3">Yeni Şifre Tekrar</h6>
                                <input type="password" class="form-control" placeholder="" name="y2password" required >

                                <button class="btn btn-primary mt-3" name="sifre">Şifreyi Güncelle</button>
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