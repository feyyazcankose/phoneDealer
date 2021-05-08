<?php

function getTableName($table_ad,$db){
        $ad_dizi=array();
        $tabload=$db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'grup2_telefon' AND TABLE_NAME='$table_ad' ORDER BY COLUMNS.ORDINAL_POSITION ASC",PDO::FETCH_ASSOC);
        foreach($tabload as $tad){
            array_push($ad_dizi,$tad['COLUMN_NAME']);
        }
        $id_ad=$ad_dizi[0];

        return array($ad_dizi,$id_ad);
    }

function Session(){
        ob_start();
        session_start();
    }
function tableGuncelle($table_ad,$db,$dizi){
        
        $a=getTableName($table_ad,$db);
        $ad_dizi=$a[0];
        $id_ad=$a[1];
        $id=$dizi["id"];
        $g=0;
        $konrol=$db->query("SELECT * FROM $table_ad");
        $kont='';
        foreach($konrol as $kont){}
        foreach($ad_dizi as $add){
            if($dizi[$add]!=''){
                if($dizi[$add]!=$kont[$add]){
                    $guncelle=$db->exec("UPDATE $table_ad SET $add='$dizi[$add]' WHERE $id_ad=$id");
                    if(!$guncelle){
                        $g=1;
                    }
                }
            }
        }
        if($g==0)
            return true;
        else
            return false;

    }
   
function columsAd($table_ad,$db){
        $a=getTableName($table_ad,$db);
        $ad_dizi=$a[0];
        $valueDizi=array();
        $adDizi=array();
        foreach($ad_dizi as $ad){
            if(strstr($ad,'_')==TRUE){
                $value=explode('_',$ad)[0].' '.explode('_',$ad)[1];
                $value=ucwords($value);
            }   
            else{
                $value=ucfirst($ad);
            }
            array_push($adDizi,$ad);
            array_push($valueDizi,$value);
        }

        return array($adDizi,$valueDizi);
    }




?>