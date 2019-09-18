<?php
require_once('include/function.php');


    $reponseQuizz = databaseconnect()->prepare("SELECT reponseQuestion FROM question WHERE idQuestion = :idQuestion ");
    $reponseQuizz->execute(array(':idQuestion' => $_POST['idQuestion2']));
    $reponseQuizz2 = $reponseQuizz -> fetch();

    if ($reponseQuizz2['reponseQuestion'] == $_POST['reponse'])
    {
        echo "good";
    }
    else 
    {
        echo "bad";
    }