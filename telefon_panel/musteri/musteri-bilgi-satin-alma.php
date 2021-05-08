<?php include_once("musteri_include.php");
      include_once("../function/guncelle_kaydet.php");
?>
<section class="content">
    <div class="row">
            <div class="container col-md-10 text-agin" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-heading mx-3 my-5">
                                <h3>Satış Noktası</h3>
                        </div>

                    </div>
                </div>
                <div class="row">
                            <div class="col-md-1">
                                        
                            </div>  
                            <?php 
                                if(isset($_GET['siparis'])){
                                $telefon_id=$_GET['telefon_id'];
                                $telefonlar=$db->query("SELECT * FROM telefonlar where telefon_id=$telefon_id");  
                                               
                                foreach($telefonlar as $telefon){}
                                }
                                    $dondur=columsAd('telefonlar',$db);
                                    $adDizi=$dondur[0];//takma adlar
                                    $valueDizi=$dondur[1];//narmal isimler

                                ?>
                              
                                <div class="col-md-5 ozellik-yaz">
                                        <div class="row">
                                            <div class="container">
                                            <h3 >
                                            <?php echo $telefon['model'].' '.$telefon['marka'].' '.$telefon['dahili_depolama'].' GB'?>
                                            </h3>
                                            </div>
                                            <hr>
                                        </div>
                                        <?php
                                            for ($i=3; $i <count($valueDizi)-1 ; $i++) { 
                                            ?>
                                            <div class="row">
                                                <div class="container">
                                                    <p class="m2">
                                                    <?php echo '<bold>'.$valueDizi[$i].':  </bold>'.$telefon[$adDizi[$i]]?>
                                                    
                                                    </p>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                        ?>
                                        
                            </div> 
                            
                            <div class="col-4">
                                    <div class="card  mx-3 telefon">
                                    <div class="card-body telefon">
                                            <div algin="center">
                                                <a href=""><img src="../img/<?php echo $_GET['resim_yolu']?>" alt="" style="display: block; margin: auto;object-fit: contain; margin-bottom:20px;width: 130%;"> </a>
                                            </div>
                                    <div class="row">
                                    <div class="col-md-12" style="margin-left: 5px; text-align: center;">
                                        
                                        <a href="musteri-siparis-ver.php?siparis=verildi&telefon_id=<?php echo $telefon['telefon_id'] ;?>&bayi_id=<?php echo $telefon['bayi_id'] ;?>&resim_yolu=<?php ?>"class="btn btn-outline-dark" style="border-radius:0px">Sipariş Ekle</a>
                                    </div>    
                                        </div>
                                  
                                        </div>
                                        
                                    
                                </div>
                                </div>
                    </div>
                </div>
                <div class="row">
                    
                    


                                

                </div>
    </div>

</section>
     
<?php 
include_once("../footer.php");
?>