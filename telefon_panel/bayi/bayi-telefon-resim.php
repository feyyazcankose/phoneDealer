<?php include_once("bayi_include.php")?>
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
            if(isset($_POST['resim_ekle'])){

                    $resim_id='';
                    $Dturu=array("image/jpeg","image/jpg","image/x-png","image/png");
                    $Duzanti=array("jpeg","jpg","png","JPG","JPEG","PNG");
                    
                    $kaynak=$_FILES['resim']['tmp_name'];
                    $resim=$_FILES['resim']['name'];
                    $boyut=$_FILES['resim']['size'];
                    $turu=$_FILES['resim']['type'];
                    $uzanti=substr($resim,strpos($resim,'.')+1);
                    $yeniad=substr(uniqid(md5(rand())),0,35).'.'.$uzanti;
                    $hedef="../img/";
                    ?>
                    
                    <div class="alert alert-danger">
                    <?php
                    if($kaynak){
                        if(!in_array($turu,$Dturu) && !in_array($uzanti,$Duzanti)){
                            echo "Lütfen bir resim dosyası seçiniz.";
                        }
                        else if($bayut>1024*1024*1024){
                            echo "Dosyanızın boyutu büyük!";
                        }
                        else{
                            if(move_uploaded_file($kaynak,$hedef.$yeniad)){
            
                                $resim_ekle=$db->exec("INSERT INTO resimler (resim_yolu) VALUES ('$yeniad')");
                                if($resim_ekle){
                                    $resim=$db->query("SELECT resim_id FROM resimler ORDER BY resim_id DESC LIMIT 1");
                                    foreach($resim as $resim_id){}
                                    $resim_id=$resim_id['resim_id'];
                                    echo "Resim yükleme işlemi başarılı".$resim_id;
                                }
                                else{
                                    echo "Resim yükleme işlemi başarısızdır.";
                                }
                            }
                            else{
                                echo "Teknik bir sorun yaşanmaktadır en kısa zamanda çözülecektir.";
                            }
            
                        }
                    }
                    else{
                        echo "Lütfen bir dosya seçiniz.";
                    }
                    ?>
                    </div>
                    <?php
                    $telefon_id =$_POST['telefon_id'];
                    $guncelle=$db->exec("UPDATE telefonlar SET resim_id='$resim_id' WHERE telefon_id=$telefon_id");
                    if(!$guncelle){
                        $g=1;
                        echo $deger.' '.$g.'<br>';
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
                        <form action="" method="POST" enctype="multipart/form-data">

                            <h6 class="text-muted font-semibold mt-3">Telefon Seç</h6>
                            <select class="form-select form-select-lg mb-3 mt-3" aria-label=".form-select-lg example " name="telefon_id">
                                            <?php 
                                            $bayi=$_SESSION['bayi_id'];
                                            $telefonlar=$db->query("SELECT * FROM telefonlar WHERE bayi_id=$bayi",PDO::FETCH_ASSOC);
                                            foreach($telefonlar as $telefon){
                                                    echo '<option value="'.$telefon['telefon_id'].'">'.$telefon['marka'].' '.$telefon['model'].' ( '.$telefon['telefon_id'].' )';
                                            }
                                            ?>
                            </select>
                            <h6 class="text-muted font-semibold mt-3">Resim Yükle</h6>
                            <input type="file" name="resim" class="form-control mb-4" >

                            <button class="btn btn-primary mt-3" name="resim_ekle">Resim Ekle</button>
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