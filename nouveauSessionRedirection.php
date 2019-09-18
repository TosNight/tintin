
<?php
session_start();

$_SESSION['album_image'] = $_GET['album_image']; 

require_once('include/function.php');
$bdd = databaseconnect()->query("SELECT album_ref, album_image FROM album WHERE album_image = '".$_GET['album_image']."'"); 
$bdd2 = $bdd->fetch();
$_SESSION['album_ref'] = $bdd2['album_ref'];


$bdd3 = databaseconnect()->query("SELECT COUNT(jurons_num) FROM se_trouver_bulle WHERE ref_album = '".$_SESSION['album_ref']."'");
$bdd4 = $bdd3->fetch();
$_SESSION['nbrJuronsBd'] = $bdd4[0];


echo $_SESSION['album_image']," ", $_SESSION['album_ref'] ,$_SESSION['nbrJuronsBd']  ;


?>
