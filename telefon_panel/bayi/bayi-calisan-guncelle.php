<?php include_once("bayi_include.php")?>

<section style="margin-left: 300px;">
    <div class="container text-agin">
        <div class="row">
            <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Çalışan Güncelle</h3>
                </div>

            </div>
        </div>
            <!--Calısan Sil-->
            <?php
                if(isset($_GET['sil'])){
                    ?>
                    <?php
                        if(!isset($_GET['onay'])){
                        ?>
                            <div class="alert alert-dark-blue ">
                                <span> 
                                <?php echo $_GET['sil']." TC kimlik numaralı çalışan silinsin mi?";?>
                                </span>
                                <a href="bayi-calisan-guncelle.php?sil=<?php echo $_GET['sil']?>&onay=evet" type="button" class="btn btn-primary">Evet</a>
                            </div>
                        <?php
                        }
                        else{ 
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            $tc=$_GET['sil'];
                            if($db->exec("DELETE from bayi_calisanlari where tc='$tc'")){
                                echo $tc." TC Kimlik Numaralı çalışanın kayıdı silindi";
                            }
                            else{
                                echo  $tc." TC Kimlik Numaralı çalışanın kayıdı silinemedi";
                            }
                            ?>
                        </div>
                        <?php
                        }
                        ?>
                    <?php
                }
            ?>
            <!--Calısan Sil Son-->
        </div>
             <!--Calısan Guncelle-->
        <?php
            if(isset($_POST['guncelle_2'])){
        
                $kontrol=0;
                $tc=$_POST['_tc'];
                if($_POST['tc']){
                  $ytc=$_POST['tc'];
                  $s=$db->exec("UPDATE bayi_calisanlari SET tc='$tc' WHERE tc='$ytc'");
                  if(!$s>0){
                      $kontrol=1;
                  }
                }

                if($_POST['ad']){
                    $ad=$_POST['ad'];
                    $s=$db->exec("UPDATE bayi_calisanlari SET ad='$ad' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }
                
                if($_POST['soyad']){
                    $soyad=$_POST['soyad'];
                    $s= $db->exec("UPDATE bayi_calisanlari SET soyad='$soyad' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }
                
                if($_POST['email']){
                    $email=$_POST['email'];
                    $s=$db->exec("UPDATE bayi_calisanlari SET email='$email' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }
                
                if($_POST['telefon_no']){
                    $telefon_no=$_POST['tel'];
                    $s=$db->exec("UPDATE bayi_calisanlari SET telefon_no='$telefon_no' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }
                
                if($_POST['gorev']){
                    $gorev=$_POST['gorev'];
                    $s=$db->exec("UPDATE bayi_calisanlari SET gorev='$gorev' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }
                
                if($_POST['maas']){
                    $maas=$_POST['maas'];
                    $s=$db->exec("UPDATE bayi_calisanlari SET maas='$maas' WHERE tc='$tc'");
                    if(!$s>0){
                        $kontrol=1;
                    }
                }

                if($kontorl==0){
                    ?>
                    <div class="alert alert-dark-t">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                            </svg>
                        </span> 
                    <?php
                        echo "Kayıt Başarılı bir şekilde güncellendi.";
                    ?>
                    </div>
                        <?php
                    }
                }
            ?>
             <!--Calısan Guncelle Modal-->
        <?php
        if(isset($_GET['guncelle']))
        {?>
        <div class="alert alert-dark-blue ">
            <span> 
             <?php echo $_GET['guncelle']." TC kimlik numaralı çalışan güncellensin mi?";?>
            </span>
            <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Evet</button>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Çalışan Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  
                    <div class="modal-body">
                    <form action="bayi-calisan-guncelle.php" method="POST">
                            <?php 
                                $tc=$_GET['guncelle'];
                                $bayi=$_SESSION['bayi_id'];
                                $calisan_guncel=$db->query("SELECT * FROM bayi_calisanlari WHERE tc=$tc and bayi_id=$bayi");
                                foreach($calisan_guncel as $cs_g){
                                ?>
                                    <h6 class="text-muted font-semibold mt-3">TC Kimlik Numarası</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['tc'];?>" name="tc" maxlength="11" minlength="11"  >
                                   

                                    <h6 class="text-muted font-semibold mt-3">Ad</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['ad'];?>" name="ad" >


                                    <h6 class="text-muted font-semibold mt-3">Soyad</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['soyad'];?>" name="soyad" >


                                    <h6 class="text-muted font-semibold mt-3">Email</h6>
                                    <input type="email" class="form-control" placeholder="<?php echo $cs_g['email'];?>" name="email" >


                                    <h6 class="text-muted font-semibold mt-3">Telefon Numarası</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['telefon_no'];?>" name="tel" >


                                    <h6 class="text-muted font-semibold mt-3">Görev</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['gorev'];?>" name="gorev" >

                                    <h6 class="text-muted font-semibold mt-3">Maaş</h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $cs_g['maas'];?>" name="maas" >
                                    
                                    <input type="hidden" name="_tc" value="<?php echo $cs_g['tc'];?>">

                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-primary" name="guncelle_2">Değişiklikleri Güncelle</button>
                                <?php
                                }
                            ?>
                        </form>

                        </div>
                </div>
            </div>
        </div>

        <?php }?>
        <!--Calısan Guncelle Son-->


        <!--Calısanlar Tablosu -->
        <div class="row">
            <div class="col-12">
                <div class="card mx-3">
                    <div class="card-header pb-in">
                            <br>
                            <div class="row">
                            <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Çalışan TC numarasını girin" name="ara_tc">
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-primary ara" name="ara">Ara</button>
                                                </div>
                                                <div class="col-md-5">
                                                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="sirala">
                                                            <option  value="">Önerilen Sırlama</option> 
                                                            <option value="ASC">En düşük maaş</option>
                                                            <option value="DESC">En yüksek maaş</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-primary ara" name="sirala_gonder">Sırala</button>
                                                </div>
                                            </div>
                            </form>
                            </div>
                    </div>
                    <div class="card-body pb-in">
                      <div class="table-responsive">
                      <table class="table table-dark table-hover">
                            <thead>
                                <tr>
                                <th scope="col">TC Kimlik Numarası</th>
                                <th scope="col">Ad Soyad</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefon Numarası</th>
                                <th scope="col">Görev</th>
                                <th scope="col">Maaş</th>
                                <th scope="col"> </th>
                                <th scope="col"> </th>
                                </tr>
                            </thead>
                           
                            <tbody>
                                <?php
                                    if(isset($_POST['sirala_gonder']) )
                                    {
                                        $bayi=$_SESSION['bayi_id'];
                                        $sira=$_POST['sirala'];
                                        $calisan=$db->query("SELECT * FROM bayi_calisanlari WHERE bayi_id=$bayi ORDER BY maas $sira");
                                        foreach($calisan as $cs){
                                        ?>
                                            <tr>
                                            <th scope="row"><?php echo $cs['tc']?></th>
                                            <td><?php echo $cs['ad'].' '.$cs['soyad']?></td>
                                            <td><?php echo $cs['email']?></td>
                                            <td><?php echo $cs['telefon_no']?></td>
                                            <td><?php echo $cs['gorev']?></td>
                                            <td><?php echo $cs['maas']?></td>
                                            <td><a href="bayi-calisan-guncelle.php?sil=<?php echo $cs['tc']?>"><Button class="btn btn-danger" >Sil</Button></a></td>
                                            <td> <a href="bayi-calisan-guncelle.php?guncelle=<?php echo $cs['tc']?>"><button class="btn btn-primary" >Güncelle</button></a></td>
                                            </tr>
                                        <?php

                                            unset($_POST['sirla'],$sira);
                                            
                                        }


                                    }
                                    else if(isset($_POST['ara']) && $_POST['ara_tc']!=''){

                                            $bayi=$_SESSION['bayi_id'];
                                            $tc=$_POST['ara_tc'];
                                            $calisan=$db->query("SELECT * FROM bayi_calisanlari WHERE bayi_id=$bayi and tc=$tc");
                                            foreach($calisan as $cs){
                                            ?>
                                                <tr>
                                                <th scope="row"><?php echo $cs['tc']?></th>
                                                <td><?php echo $cs['ad'].' '.$cs['soyad']?></td>
                                                <td><?php echo $cs['email']?></td>
                                                <td><?php echo $cs['telefon_no']?></td>
                                                <td><?php echo $cs['gorev']?></td>
                                                <td><?php echo $cs['maas']?></td>
                                                <td><a href="bayi-calisan-guncelle.php?sil=<?php echo $cs['tc']?>"><Button class="btn btn-danger" >Sil</Button></a></td>
                                                <td> <a href="bayi-calisan-guncelle.php?guncelle=<?php echo $cs['tc']?>"><button class="btn btn-primary" >Güncelle</button></a></td>
                                                </tr>
                                            <?php
                                            }
                                    }
                                    else{
                                            $bayi=$_SESSION['bayi_id'];
                                            $calisan=$db->query("SELECT * FROM bayi_calisanlari WHERE bayi_id=$bayi");
                                            foreach($calisan as $cs){
                                            ?>
                                                <tr>
                                                <th scope="row"><?php echo $cs['tc']?></th>
                                                <td><?php echo $cs['ad'].' '.$cs['soyad']?></td>
                                                <td><?php echo $cs['email']?></td>
                                                <td><?php echo $cs['telefon_no']?></td>
                                                <td><?php echo $cs['gorev']?></td>
                                                <td><?php echo $cs['maas']?></td>
                                                <td><a href="bayi-calisan-guncelle.php?sil=<?php echo $cs['tc']?>"><Button class="btn btn-danger" >Sil</Button></a></td>
                                                <td> <a href="bayi-calisan-guncelle.php?guncelle=<?php echo $cs['tc']?>"><button class="btn btn-primary" >Güncelle</button></a></td>
                                                </tr>
                                            <?php
                                            }
                                    }
                                ?>
                            </tbody>

                        </table>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Calısanlar Tablosu Son -->
    </div>
</section>
<?php 
include_once("../footer.php");
?>