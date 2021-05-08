<?php include_once("bayi_include.php")?>
<section style="margin-left: 300px;">
    <div class="container text-agin">
    <?php
        
            if(isset($_GET['guncelle']))
            {?>
            <div class="alert alert-dark-blue mt-5">
                <span> 
                <?php echo $_GET['telefon']." Stok güncellensin mi?";?>
                </span>
                <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Evet</button>
            </div>
            <?php }?>

            
            <?php
            if(isset($_POST['guncelle_2'])){
                $kontrol=0;
                $bayi=$_SESSION['bayi_id'];
                $tel_id=$_POST['tel_id'];
                $id=$_SESSION['gstok_id'];
                $adet=$_POST['adet'];
                if($_POST['adet']){
                
                  $stok_miktari=$db->query("SELECT stok_miktari FROM stoklar WHERE telefon_id=$tel_id and bayi_id=$bayi");
                  $toplam=0;
                  foreach($stok_miktari as $sm){
                       $toplam=$sm['stok_miktari'];
                  }
                 
                  $toplam=$toplam+$adet;
                  $s=$db->exec("UPDATE stoklar SET stok_miktari='$toplam' WHERE telefon_id='$tel_id' and bayi_id='$bayi'");
                 
                  $eklenen_adet=$db->query("SELECT toplam_eklenen_adet FROM stok_guncellemeleri WHERE stok_guncelleme_id='$id'");
                  $toplam2=0;
                  foreach($eklenen_adet as $ea){
                       $eklenen=$ea['toplam_eklenen_adet'];
                  }

                  $toplam2=$adet+$eklenen;
                  $sg=$db->exec("UPDATE stok_guncellemeleri SET eklenen_adet='$adet' WHERE stok_guncelleme_id='$id' ");
                  if(!$sg>0){
                      $kontrol=1;
                  }

                  $sg=$db->exec("UPDATE stok_guncellemeleri SET toplam_eklenen_adet='$toplam2' WHERE stok_guncelleme_id='$id' ");
                  if(!$sg>0){
                      $kontrol=1;
                  }
                }
                //UPDATE `stok_guncellemeleri` SET `birim_fiyati` = '100' WHERE `stok_guncellemeleri`.`stok_guncelleme_id` = 6;
                if($_POST['fiyat']){
                    $fiyat=$_POST['fiyat'];
                    $s=$db->exec("UPDATE stok_guncellemeleri SET birim_fiyati='$fiyat' WHERE stok_guncelleme_id='$id'");
                    $t=$db->exec("UPDATE telefonlar SET fiyat='$fiyat' WHERE telefon_id='$tel_id'");
                    if(!$s>0 && !$t>0){
                        $kontrol=1;
                    }

                }
                
                
                if($kontorl==0){
                        $time=time();
                        $tarih_= date('d.m.Y H:i:s', $time);
                        $tarih=explode(" ",$tarih_)[0];
                        $saat=explode(" ",$tarih_)[1];
                        $tarih_saat=explode(".",$tarih)[2].'-'.explode(".",$tarih)[1].'-'.explode(".",$tarih)[0].' '.$saat;
                        $s= $db->exec("UPDATE stok_guncellemeleri SET tarih='$tarih_saat' WHERE stok_guncelleme_id='$id'");
                   ?>
                    <div class="alert alert-dark-t mt-5">
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
        <div class="row">
            <div class="col-md-12">
                    <div class="page-heading mx-3 my-5">
                            <h3>Stoklar</h3>
                    </div>
            </div>
        </div>  
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $_GET['telefon']?> Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  
                    <div class="modal-body">
                    <form action="bayi-stok.php" method="POST">
                            <?php 
                                $tel_id=$_GET['guncelle'];
                                $bayi=$_SESSION['bayi_id'];
                                $stok_guncel=$db->query("SELECT * FROM stok_guncellemeleri WHERE telefon_id=$tel_id and bayi_id=$bayi");
                                foreach($stok_guncel as $st_g){
                                ?>
                                    
                                    <h6 class="text-muted font-semibold mt-3">Stok Ekle</h6>
                                    <input type="number" class="form-control" placeholder="" value="0" name="adet">
                                   

                                    <h6 class="text-muted font-semibold mt-3">Birim Fiyat</h6>
                                    <input type="text" class="form-control" value="<?php echo $st_g['birim_fiyati'];?>" name="fiyat">



                                    <input type="hidden" value="<?php echo $tel_id?>" name='tel_id'>
                                    <?php $_SESSION['gstok_id']=$st_g['stok_guncelleme_id'];?>     
                                    <div class="mt-5">
                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-primary" name="guncelle_2">Değişiklikleri Güncelle</button>
                                    </div>
                                   
                                <?php
                                }
                            ?>
                        </form>

                        </div>
                </div>
            </div>
        </div>

        <!--Calısan Guncelle Son-->

        <div class="row">
            <div class="col-12">
                <div class="card mx-3">
                    <div class="card-header pb-in">
                        <h4>Stoklar Güncellemeleri</h4>
                    </div>
                    <div class="card-body pb-in">
                        <form action="">
                            <div class="table-responsive">
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Toplam Eklenen Stok</th>
                                    <th scope="col">Eklenen Stok</th>
                                    <th scope="col">Birim Fiyat</th>
                                    <th scope="col">Güncellenme Tarihi</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php
                                     $bayi=$_SESSION['bayi_id'];
                                     $stok=$db->query("SELECT stok_guncellemeleri.telefon_id as tel_id,telefonlar.marka as marka ,telefonlar.model as model ,stok_guncellemeleri.toplam_eklenen_adet as toplam_adet,stok_guncellemeleri.eklenen_adet as adet ,stok_guncellemeleri.birim_fiyati as fiyat,stok_guncellemeleri.tarih as tarih , stok_guncellemeleri.stok_guncelleme_id as stok_id FROM stok_guncellemeleri inner join telefonlar on telefonlar.telefon_id=stok_guncellemeleri.telefon_id WHERE stok_guncellemeleri.bayi_id=$bayi");
                                     foreach($stok as $st){
                                     ?>
                                         <tr>
                                         <th scope="row"><?php echo $st['marka'].' '.$st['model']?></th>
                                         <td><?php echo $st['toplam_adet']?></td>
                                         <td><?php echo $st['adet']?></td>
                                         <td><?php echo $st['fiyat']?></td>
                                         <td><?php echo $st['tarih']?></td>
                                         
                                         </tr>
                                     <?php
                                         
                                     }
                                    ?>



                                </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-5">
                <div class="card mx-3">
                    <div class="card-body pb-in">
                        <form action="pdo-bayi-stokekle.php" method="POST" >
                                <h6 class="text-muted font-semibold mt-3">Telefon Seç</h6>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="telefon">
                                    
                                    <?php
                                        $verisor=$db->query("SELECT telefon_id, marka , model FROM telefonlar",PDO::FETCH_ASSOC);
                                         foreach($verisor as $yaz){
                                            echo  '<option value="'.$yaz['telefon_id'].'">'.$yaz['marka'].' '.$yaz['model'].'</option>';
                                        }
                                    ?>
                                </select>

                                <h6 class="text-muted font-semibold mt-3 " >Adet</h6>
                                <input type="text" class="form-control" placeholder="Telefon adetini giriniz" name="adet">

                                
                                <h6 class="text-muted font-semibold mt-3">Birim Fiyat</h6>
                                <input type="text" class="form-control" placeholder="Telefon fiyatını giriniz" name="fiyat">

                                <button class="btn btn-primary mt-3" name="stok">Telefon Ekle</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="card mx-3">
                    <div class="card-body pb-in">
                        <form action="">
                            <div class="table-responsive">
                            <table class="table table-dark">
                                    <thead>
                                        <tr>
                                        <th scope="col">Bayi Adı</th>
                                        <th scope="col">Telefon</th>
                                        <th scope="col">Stok Miktarı</th>
                                        <th scope="col"> </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $bayi_id=$_SESSION['bayi_id'];
                                        $verisor=$db->query("SELECT * FROM stoklar where bayi_id=$bayi_id",PDO::FETCH_ASSOC);
                                        foreach($verisor as $yaz){
                                            echo '<tr><th scope="row">'.$_SESSION['ad']."</th>";
                                            $tel=$yaz['telefon_id'];
                                            $telefon=$db->query("SELECT marka,model FROM telefonlar where telefon_id=$tel",PDO::FETCH_ASSOC);
                                            foreach($telefon as $tele){
                                            echo "<td>".$tele['marka']." ".$tele['model']."</td>";
                                            }
                                            echo "<td>".$yaz['stok_miktari']."</td>";

                                        }
                                        ?>
                                        <td> <a href="bayi-stok.php?guncelle=<?php echo $tel?>" class="btn btn-primary">Güncelle</a></td>
                                        </tr>
                                            <?php
                                    ?>
                                    
                                    </tbody>
                                    </table>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<?php include_once("../footer.php");?>