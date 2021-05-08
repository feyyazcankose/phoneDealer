<?php
include_once("bayi_include.php");
include_once("../function/guncelle_kaydet.php");

?>
<?php
    $table_ad="telefonlar";
    $donus=getTableName($table_ad,$db);
    $ad_dizi=$donus[0];
    $id_ad=$donus[1];

    
?>
<section style="margin-left: 300px;">
    <div class="container text-agin">
                <?php
                if(isset($_GET['sil'])){
                ?>
                <?php
                    if(!isset($_GET['onay'])){
                ?>
                    <div class="alert alert-dark-blue mt-5" id="alert">
                        <span> 
                            <strong><?php echo $_GET['sil']?><strong> Numaralı telefon silinsin mi?                                      
                        </span>
                        <a href="bayi-telefon-guncelle.php?sil=<?php echo $_GET['sil']?>&onay=evet" type="button" class="btn btn-primary">Evet</a>
                    </div>
                           
                <?php
                }
                else{ 
                ?>
                <div class="alert alert-danger">
                    <?php
                        $id=$_GET['sil'];
                        if($db->exec("DELETE from $table_ad where $id_ad='$id'")){
                            echo $id." Numaralı telefon bayinizden silindi";
                        }
                        else{
                            echo  $id." Numaralı telefon bayinizden silinemedi";
                        }
                    ?>
                </div>
                <?php
                }
                }
                ?>

                <?php
                if(isset($_GET['guncelle']))
                {?>
                <div class="alert alert-dark-blue mt-5">
                    <span> 
                    <?php echo $_GET['guncelle']."  Numaralı telefon güncellensin mi?";?>
                    </span>
                    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Evet</button>
                </div>
                <?php }?>

                <?php
                if(isset($_POST['guncelle_2'])){
                    $dizi=$_POST;
                    if(tableGuncelle($table_ad,$db,$dizi)){
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
                        <div class="row" >
                            <div class="col-md-12">
                                <div class="page-heading mx-3 my-5">
                                        <h3>
                                            Telefonlar
                                        </h3>
                                </div>
                            </div>
                        </div>
           

            <div class="row" >
            <div class="col-12">
                <div class="card mx-3">
                    <div class="card-header pb-in">
                            <br>
                            <div class="row">
                                        <form action="" method="POST">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Telefon ID girin" name="ara_tel">
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-primary ara" name="ara">Ara</button>
                                                </div>
                                                <div class="col-md-5">
                                                        <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example" name="sirala">
                                                            <option  value="">Önerilen Sırlama</option> 
                                                            <option value="ASC">En düşük fiyat</option>
                                                            <option value="DESC">En yüksek fiyat</option>
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
                        <table class="table  table-sm ">
                            <thead class="table-dark "> 
                                <tr>
                                    <!--Class-->
                                    <?php
                                    $AdValue=columsAd($table_ad,$db);
                                    $value_dizi=$AdValue[1];
                                    foreach($value_dizi as $ad_n){
                                    ?>
                                        <th scope="col"><?php echo $ad_n?></th>
                                    <?php
                                    }
                                    ?>
                                    <th scope="col"> </th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                           
                            <tbody class="table-dark ">
                                <?php
                                    if(isset($_POST['sirala_gonder']) )
                                    {
                                        $bayi=$_SESSION['bayi_id'];
                                        $sirala=$_POST['sirala'];
                                        $telefon=$db->query("SELECT * FROM $table_ad  WHERE bayi_id=$bayi ORDER BY fiyat $sirala ");
                                        foreach($telefon as $tel){
                                        ?>
                                            <tr>
                                                <?php
                                                foreach($ad_dizi as $ad){
                                                ?>
                                                    <td><?php echo $tel["$ad"]?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><a href="bayi-telefon-guncelle.php?sil=<?php echo $tel["$id_ad"]?>"  onclick="calistir()"><Button class="btn btn-danger" >Sil</Button></a></td>
                                                <td> <a href="bayi-telefon-guncelle.php?guncelle=<?php echo $tel["$id_ad"]?>"><button class="btn btn-primary" >Güncelle</button></a></td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else if(isset($_POST['ara']) && $_POST['ara_tel']!=''){
                                        $bayi=$_SESSION['bayi_id'];
                                        $id=$_POST['ara_tel'];
                                        $telefon=$db->query("SELECT * FROM $table_ad WHERE bayi_id=$bayi and $id_ad= $id");
                                        foreach($telefon as $tel){
                                        ?>
                                            <tr>
                                                <?php
                                                foreach($ad_dizi as $ad){
                                                ?>
                                                    <td><?php echo $tel["$ad"]?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><a href="bayi-telefon-guncelle.php?sil=<?php echo $tel["$id_ad"]?>"><Button class="btn btn-danger" >Sil</Button></a></td>
                                                <td> <a href="bayi-telefon-guncelle.php?guncelle=<?php echo $tel["$id_ad"]?>"><button class="btn btn-primary" >Güncelle</button></a></td>
                                            </tr>
                                        <?php
                                            }
                                    }
                                    else{
                                            $bayi=$_SESSION['bayi_id'];
                                            $telefon=$db->query("SELECT * FROM $table_ad WHERE bayi_id=$bayi");
                                            foreach($telefon as $tel){
                                            ?>
                                            <tr>
                                                <?php
                                                foreach($ad_dizi as $ad){
                                                ?>
                                                    <td><?php echo $tel["$ad"]?></td>
                                                <?php
                                                }
                                                ?>
                                                <td><a href="bayi-telefon-guncelle.php?sil=<?php echo $tel["$id_ad"]?>"><Button class="btn btn-danger" >Sil</Button></a></td>
                                                <td> <a href="bayi-telefon-guncelle.php?guncelle=<?php echo $tel["$id_ad"]?>"><button class="btn btn-primary" >Güncelle</button></a></td>
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
            
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Telefon Güncelle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                  
                    <div class="modal-body">
                    <form action="bayi-telefon-guncelle.php" method="POST">
                        <!--Class-->
                            <?php 
                                $id=$_GET['guncelle'];
                                $bayi=$_SESSION['bayi_id'];
                                $guncelle=$db->query("SELECT * FROM $table_ad WHERE $id_ad=$id and bayi_id=$bayi");
                                //Tablo Adlarını çek
                                $AdValue=columsAd($table_ad,$db);
                                $ad=$AdValue[0];
                                $value_dizi=$AdValue[1];
                                $g='';
                                foreach($guncelle as $g){}
                                for($i=0;$i<(count($g)/2);$i++){
                                ?>
                                    <h6 class="text-muted font-semibold mt-3"><?php echo $value_dizi[$i]?></h6>
                                    <input type="text" class="form-control" placeholder="<?php echo $g[$i];?>" name="<?php echo $ad[$i]?>"> 
                                <?php
                                }
                                ?>
                                    <input type="hidden" class="form-control" value="<?php echo $id;?>" name="id"> 

                                    <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                                    <button type="submit" class="btn btn-primary" name="guncelle_2">Değişiklikleri Güncelle</button>
                                <?php
                            ?>
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