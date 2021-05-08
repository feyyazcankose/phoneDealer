<?php include_once("bayi_include.php")?>
<section style="margin-left: 300px;">
    <div class="container text-agin">
        <div class="row">
        <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Sipariş</h3>
                </div>
            </div>
        </div>
        <?php
                            if(isset($_POST['gonder'])){
                                $bayi=$_SESSION['bayi_id'];
                                $siparis_id=$_POST['siparis_id'];
                                $telefon_id=$_POST['telefon_id'];
                                $siparis_miktari=$_POST['siparis_miktari'];
                                $gonderim_durumu=$db->query("SELECT gonderim_durumu,siparis_gonderim_tarihi FROM siparisler WHERE siparis_id='$siparis_id'",PDO::FETCH_ASSOC);
                                
                                $gnd='';
                                $spt='';
                                foreach($gonderim_durumu as $gn){
                                    $gnd= $gn['gonderim_durumu'];
                                    $spt= $gn['siparis_gonderim_tarihi'];

                                }
                                
                                #Sipariş Gönderim Kontrolu
                                $stok_miktari=$db->query("SELECT stok_miktari FROM stoklar WHERE telefon_id='$telefon_id' and bayi_id='$bayi'",PDO::FETCH_ASSOC);
                                $stok_m=0;
                                foreach($stok_miktari as $stm)
                                {
                                    $stok_m=$stm['stok_miktari'];
                                }
                                #Sipariş Gönderim Kontrolu
                                if($gnd!='Gönderildi'){
                                    #Sipariş ve Stok Kontrolu
                                    if($stok_m >= $siparis_miktari){
                                        $time=time();
                                        $siparis_gonderim_tarihi= date('d.m.Y H:i:s', $time);
                                        $tarih=explode(" ",$siparis_gonderim_tarihi)[0];
                                        $saat=explode(" ",$siparis_gonderim_tarihi)[1];
                                        $tarih_saat=explode(".",$tarih)[2].'-'.explode(".",$tarih)[1].'-'.explode(".",$tarih)[0].' '.$saat;

                                        $gonder=$db->exec("UPDATE siparisler SET gonderim_durumu='Gönderildi' WHERE siparis_id='$siparis_id' ");
                                        $gonder2=$db->exec("UPDATE siparisler SET siparis_gonderim_tarihi='$tarih_saat' WHERE siparis_id='$siparis_id'");
                                    
                                        $kalan_stok_miktari=$stok_m-$siparis_miktari;
                                        $stok=$db->exec("UPDATE stoklar SET stok_miktari='$kalan_stok_miktari' WHERE telefon_id='$telefon_id' and bayi_id='$bayi'");
                                    
                                        if($gonder){
                                            ?>
                                                <div class="alert alert-success">
                                                    <?php
                                                        echo "Siparişiniz Başarılı şekilde gönderilmiştir. Kalan Stok Miktarınız: ".$kalan_stok_miktari;
                                                    ?>
                                                </div>
                                            <?php
                                        }
                                        else{
                                            ?>
                                                <div class="alert alert-danger">
                                                    <?php
                                                        echo "Teknik bir sorundan dolayı siparişinizi gönderemiyoruz.";
                                                    ?>
                                                </div>
                                            <?php
                                        }
                                    }
                                    else{
                                        ?>
                                        <div class="alert alert-danger">
                                            <?php
                                                echo "Bu ürün için stok elinizde mevcut değil lütfen stok ekleyiniz.";
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    
                                }
                                else{
                                    ?>
                                        <div class="alert alert-info">
                                            <?php
                                                echo $spt." Tarihinde siparişiniz gönderilmiştir.";
                                            ?>
                                        </div>

                                    <?php
                                }
                              
                            }
                            ?>
                    <div class="row">
                    <div class="col-12">
                        <div class="card mx-3 ">
                            <div class="card-header pb-in">
                                <h4>Sipariş Seç</h4>
                            </div>
                            <div class="card-body pb-in">
                                <form action="" method="POST">
                                        <select class="form-select form-select-lg mb-3 mt-3" aria-label=".form-select-lg example " name="siparis_id">
                                            <?php 
                                            $bayi=$_SESSION['bayi_id'];
                                            $siparis_musteri=$db->query("SELECT siparisler.adet as siparis_miktari ,siparisler.siparis_id AS sp_id ,siparisler.telefon_id AS telefon_id ,musteriler.ad AS ms_ad ,musteriler.soyad AS ms_soyad FROM siparisler INNER JOIN musteriler ON siparisler.musteri_id=musteriler.musteri_id WHERE siparisler.bayi_id=$bayi",PDO::FETCH_ASSOC);
                                            $tel_id='';
                                            $siparis_miktari='';
                                            foreach($siparis_musteri as $sp){
                                                $tel_id=$sp['telefon_id'];
                                                $siparis_miktari=$sp['siparis_miktari'];
                                                $telefon=$db->query("SELECT marka,model FROM telefonlar WHERE telefon_id=$tel_id",PDO::FETCH_ASSOC);
                                                foreach($telefon as $tel){
                                                    echo '<option value="'.$sp['sp_id'].'">'.$tel['marka'].' '.$tel['model'].' ( '.$sp['ms_ad'].' '.$sp['ms_soyad'].' )';
                                                }
                                            }
                                            ?>
                                        </select>
                                       
                                        <input type="hidden" value="<?php echo $tel_id?>" name="telefon_id">
                                        <input type="hidden" value="<?php  echo $siparis_miktari?>" name="siparis_miktari">
                                        <div class="col-md-4 mt-4">
                                    <button class="btn btn-primary" name="gonder">Siparişi Gönder</button>
                                </div>
                                </form>  
                                <h3><?php 
                                   
                                
                                ?></h3>                  
                            </div>
                            
                          
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-30">
                    <div class="col-12">
                        <div class="card mx-4 siparis">
                            <div class="card-header pb-in">
                            </div>
                        <div class="card-body pb-in">
                        <div class="table-responsive">
                        <table class="table table-dark">
                                <thead>
                                    <tr>
                                    <th scope="col">Sipariş</th>
                                    <th scope="col">Bayi</th>
                                    <th scope="col">Müşteri</th>
                                    <th scope="col">Telefon</th>
                                    <th scope="col">Adet</th>
                                    <th scope="col">Fiyat</th>
                                    <th scope="col">Gönderim Durumu</th>
                                    <th scope="col">Spariş Tarihi</th>
                                    <th scope="col">Spariş Gönderim Tarihi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $bayi_id=$_SESSION['bayi_id'];
                                        #$siparis=$db->query("SELECT * FROM siparisler WHERE bayi_id=$bayi_id",PDO::FETCH_ASSOC);
                                        $siparis=$db->query("SELECT * FROM siparisler INNER JOIN musteriler ON siparisler.musteri_id=musteriler.musteri_id",PDO::FETCH_ASSOC);
                                        foreach($siparis as $sp){
                                            $tel=$sp['telefon_id'];
                                            $telefon=$db->query("SELECT model,marka FROM telefonlar WHERE telefon_id=$tel");
                                            foreach($telefon as $tel_ad){
                                                echo '<tr>';
                                                echo '<th scope="row">'.$sp['siparis_id'].'</th>';
                                                echo '<td>'.$_SESSION['ad'].'</td>';
                                                echo '<td>'.$sp['ad'].' '.$sp['soyad'].'</td>';
                                                echo '<td>'.$tel_ad['marka'].' '.$tel_ad['model'].'</td>';
                                                echo '<td>'.$sp['adet'].'</td>';
                                                echo '<td>'.$sp['urun_fiyati'].'</td>';
                                                echo '<td>'.$sp['gonderim_durumu'].'</td>';
                                                echo '<td>'.$sp['siparis_tarihi'].'</td>';
                                                echo '<td>'.$sp['siparis_gonderim_tarihi'].'</td>';

                                                echo '</tr>';
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
        </div>
    </div>
</section>
<?php 
include_once("../footer.php");
?>