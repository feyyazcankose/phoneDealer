<?php
include_once("musteri_include.php");
include_once("musteri.php");
include_once("../function/guncelle_kaydet.php");
?>



<section class="content">
    <div class="row">

    <div class="sirala-menu col-md-2 mt-5">
        <div class="container " >
        
        <div class="row">
            <h6>Marka</h6>  
            <form action="">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Apple
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Samsung
                </label>
            </form>

        </div>
        <div class="row mt-4">
        <h6>Fiyat</h6>
            <form action="">
                <div class="row">
                    <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Max">
                    </div>
                    <div class="col-md-6">
                    <input type="number" class="form-control" placeholder="Min">
                    </div>
                </div>
            </form>
        </div>
        <div class="row mt-4">
           
            <h6>Dahili Bellek</h6>
            <form action="">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Apple
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Samsung
                </label>
            </form>
        </div>
        <div class="row mt-4">
            <h6>İşletim Sistemi</h6>
            <form action="">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Apple
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Samsung
                </label>
            </form>
        </div>
        <div class="row mt-4 ">
            <h6>Kamera Çözünrlüğü</h6>
            <form action="">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Apple
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                    Samsung
                </label>
            </form>
        </div>
        </div>
    </div>
    
    <div class="container col-md-10 text-agin" >

        <div class="row">
            <div class="col-md-12">
                <div class="page-heading mx-3 my-5">
                        <h3>Telefonlar</h3>
                </div>

            </div>
        </div>
        <?php
                if(isset($_GET['siparis'])){
                    $telefon_id=$_GET['telefon_id'];
                    $bayi_id=$_GET['bayi_id'];

                    
                }        
        
        
        ?>
        <div class="row">
                    <?php 
                    $telefonlar=$db->query("SELECT * FROM telefonlar INNER JOIN resimler on telefonlar.resim_id=resimler.resim_id");                            
                    foreach($telefonlar as $telefon){
                    ?>
                    <div class="col-4">
                    <div class="card  mx-3 telefon">
                        <div class="card-body telefon">
                                
                                <div algin="center">
                                    <a href="musteri-bilgi-satin-alma.php?siparis=true&telefon_id=<?php echo $telefon['telefon_id'] ;?>&bayi_id=<?php echo $telefon['bayi_id'] ;?>&resim_yolu=<?php echo $telefon['resim_yolu']?>"><img src="../img/<?php echo $telefon['resim_yolu']?>" alt="" style="display: block; margin: auto;object-fit: contain; margin-bottom:20px;"> </a>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <p>
                                        <?php echo $telefon['model'].' '.$telefon['marka'].' '.$telefon['dahili_depolama'].' GB'?>
                                        </p>
                                    </div>
                            
                                </div>
                                <div class="row">
                                        <h6><?php echo '₺'.$telefon['fiyat']?></h6>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <a herf="musteri-siparis-ver.php?telefon_id=<?php echo $telefon['telefon_id'] ;?>&bayi_id=<?php echo $telefon['bayi_id'] ;?>" class="btn btn-outline-danger" style="border-radius:0px"><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg></span> </a>
                                    </div>
                                    <div class="col-md-4" style="margin-left: 1px; ">
                                        <a class="btn btn-outline-dark" style="border-radius:0px">Özellikler</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>            
        </div>
</div>
    </div>

</section>
     
<?php 
include_once("../footer.php");
?>