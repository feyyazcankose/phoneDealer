<?php
$bayi_id='';
$host='localhost';
$dbname='grup2_telefon';
$user='root';
$password='12345678';

try 
{
    $db= new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
}
catch (PDOException $e) {
    echo $e->getMessage();
}

ob_start();
session_start();
?>  