<?php
function databaseconnect(){
    try {
        $strConnection = 'mysql:host=localhost;dbname=haddock';
        $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $pdo = new PDO($strConnection, 'root','', $arrExtraParam);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
        $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
        die($msg);
    }
    return $pdo;
}
function formulaires($valeur){
    $valeur=trim(htmlspecialchars($valeur));
    return $valeur;
}
?>