<?php
require_once('include/function.php');



if ($_POST['action'] == "ajoute") 
{

    if (!isset($_POST['referenceAlbum']) || !isset($_POST['titreAlbum']) || !isset($_POST['dateParution']) || !isset($_POST['tome'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['referenceAlbum'] == '' || $_POST['titreAlbum'] == '' || $_POST['dateParution'] == ''||$_POST['tome'] == '')
    {
        echo "error_add_vide";
        return FALSE;
    }

    $feu = databaseconnect()->prepare("SELECT * FROM album WHERE album_ref = :album_ref");
    $feu->execute(array(':album_ref' => addslashes($_POST['referenceAlbum'])));
    $feu2 = $feu->fetch();

    if ($feu2['album_ref']==$_POST['referenceAlbum'])
    {
        echo "ComposantExistant";
    }
    else
    {
       $feu = databaseconnect()->prepare("SELECT * FROM album WHERE album_titre = :album_titre");
       $feu->execute(array(':album_titre' => addslashes($_POST['titreAlbum'])));
       $feu3 = $feu->fetch(); 

        if($feu3['album_titre']==$_POST['titreAlbum'])
        {
            echo "ComposantExistant";
        }
        else
        {
            $feu = databaseconnect()->prepare("SELECT * FROM album WHERE album_tome = :album_tome");
            $feu->execute(array(':album_tome' => addslashes($_POST['tome'])));
            $feu4 = $feu->fetch();

            if ($feu4['album_tome']==$_POST['tome'])
            {
                echo "ComposantExistant";
            }

            else 
            {
                $album = "Tintin_".$_POST['tome']."";
                            $query_home = databaseconnect()->prepare("INSERT INTO album VALUES (?,?,?,?,?)");
                            $query_home->execute(array(addslashes($_POST['referenceAlbum']), addslashes($_POST['titreAlbum']),addslashes($_POST['dateParution']),addslashes($_POST['tome']), $album ));
                            echo "success_add";
            }
                    
            
        }
    }     

} 











// addslashes









if ($_POST['action'] == "supprimerBD") {

    if (!isset($_POST['referenceAlbumSup'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['referenceAlbumSup']== "") 
    {
        echo "error_parametre";
        return FALSE;
    }
    $veri = databaseconnect()->query("SELECT album_ref FROM album WHERE album_ref = '".addslashes($_POST['referenceAlbumSup'])."'");
    $veri2 = $veri->fetch();
    

    if ($veri2['album_ref'] == null)
    {
        echo "existePasDansLaBdd";
    }
    else
    {
    databaseconnect()->query("DELETE FROM se_trouver_bulle WHERE ref_album = '".addslashes($_POST['referenceAlbumSup'])."'");
    databaseconnect()->query("DELETE FROM case_bulle WHERE ref_album = '".addslashes($_POST['referenceAlbumSup'])."'");
    databaseconnect()->query("DELETE FROM page WHERE ref_album = '".addslashes($_POST['referenceAlbumSup'])."'");
    databaseconnect()->query("DELETE FROM bande WHERE ref_album = '".addslashes($_POST['referenceAlbumSup'])."'");
    databaseconnect()->query("DELETE FROM album WHERE album_ref = '".addslashes($_POST['referenceAlbumSup'])."'");
    echo "success_del";
    }

} 


























if ($_POST['action'] == "jurons") 
{

    if (!isset($_POST['numeroJuronsSitue']) || !isset($_POST['albumReferenceSitue']) || !isset($_POST['numeroPageSitue']) ||!isset($_POST['numeroCaseSitue'])||!isset($_POST['bandeSitue'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['numeroJuronsSitue'] == '' || $_POST['albumReferenceSitue'] == ''||$_POST['numeroPageSitue'] == ''||  $_POST['numeroCaseSitue'] == ''||  $_POST['bandeSitue'] == '') 
    {
        echo "error_add_vide";
        return FALSE;
    }

    $query3 = databaseconnect()->prepare("SELECT jurons_num, jurons_texte FROM jurons WHERE jurons_texte = :jurons_texte ");
    $query3->execute(array(':jurons_texte' => addslashes($_POST['numeroJuronsSitue'])));
    $queryy3 = $query3->fetch();

    $query2 = databaseconnect()->prepare("SELECT * FROM se_trouver_bulle WHERE num_case = :num_case AND num_page = :num_page AND place_bande=:place_bande AND  ref_album=:ref_album AND  jurons_num=:jurons_num");
    $query2->execute(array(':num_case' => addslashes($_POST['numeroCaseSitue']),':num_page' => addslashes($_POST['numeroPageSitue']),':place_bande' => addslashes($_POST['bandeSitue']),':ref_album' => addslashes($_POST['albumReferenceSitue']),':jurons_num' => $queryy3['jurons_num'] ));
    $queryy2 = $query2->fetch();


    if ($queryy2['num_case'] == $_POST['numeroCaseSitue'] && $queryy2['num_page'] == $_POST['numeroPageSitue'] && $queryy2['place_bande'] == $_POST['bandeSitue'] && $queryy2['ref_album'] == $_POST['albumReferenceSitue']  )
    {
        echo "dejaPresentDansLaBd";
    }

    else
    {
    $query = databaseconnect()->prepare("SELECT jurons_num, jurons_texte FROM jurons WHERE jurons_texte = :jurons_texte ");
    $query->execute(array(':jurons_texte' => addslashes($_POST['numeroJuronsSitue'])));
    $queryy = $query->fetch();

    if ($queryy["jurons_texte"] == $_POST['numeroJuronsSitue'])
    {    


                                    $query4 = databaseconnect()->prepare("SELECT page_num FROM page WHERE page_num = :num_page AND ref_album = :ref_album ");
                                    $query4->execute(array(':num_page' => addslashes($_POST['numeroPageSitue']), ':ref_album' => addslashes($_POST['albumReferenceSitue'])));
                                    $queryy4 = $query4->fetch();

                                    if ($queryy4['page_num'] == $_POST['numeroPageSitue'])
                                    { 
                                        
                                    }
                                    else
                                    {
                                        $query_home = databaseconnect()->prepare("INSERT INTO page VALUES (?,?)");
                                        $query_home->execute(array(addslashes($_POST['numeroPageSitue']), addslashes($_POST['albumReferenceSitue'])));
                                    }







                                    $query5 = databaseconnect()->prepare("SELECT bande_place, num_page FROM bande WHERE bande_place=:bande_place AND num_page = :num_page AND ref_album = :ref_album ");
                                    $query5->execute(array(':bande_place' => addslashes($_POST['bandeSitue']), ':num_page' => addslashes($_POST['numeroPageSitue']), ':ref_album' => addslashes($_POST['albumReferenceSitue'])));
                                    $queryy5 = $query5->fetch();

                                    if ($queryy5['num_page'] == $_POST['numeroPageSitue'] && $queryy5['bande_place'] == $_POST['bandeSitue'] )
                                    { 

                                    }
                                    else
                                    {
                                    $query_home = databaseconnect()->prepare("INSERT INTO bande VALUES (?,?,?)");
                                    $query_home->execute(array(addslashes($_POST['bandeSitue']) ,addslashes($_POST['numeroPageSitue']), addslashes($_POST['albumReferenceSitue'])));
                                    }



                                    $query6 = databaseconnect()->prepare("SELECT case_num,place_bande, num_page FROM case_bulle WHERE  case_num = :case_num AND place_bande=:bande_place AND num_page = :num_page AND ref_album = :ref_album ");
                                    $query6->execute(array(':case_num' => addslashes($_POST['numeroCaseSitue']),':bande_place' => addslashes($_POST['bandeSitue']), ':num_page' => addslashes($_POST['numeroPageSitue']), ':ref_album' => addslashes($_POST['albumReferenceSitue'])));
                                    $queryy6 = $query6->fetch();

                                    if ($queryy6['case_num'] == $_POST['numeroCaseSitue'] && $queryy6['num_page'] == $_POST['numeroPageSitue'] && $queryy6['place_bande'] == $_POST['bandeSitue'] )
                                    { 

                                    }
                                    else
                                    {
                                    $query_home = databaseconnect()->prepare("INSERT INTO case_bulle VALUES (?,?,?,?)");
                                    $query_home->execute(array(addslashes($_POST['numeroCaseSitue']), addslashes($_POST['bandeSitue']) , addslashes($_POST['numeroPageSitue']), addslashes($_POST['albumReferenceSitue']) ));
                                    }


                                    $query_home = databaseconnect()->prepare("INSERT INTO se_trouver_bulle VALUES (?,?,?,?,?)");
                                    $query_home->execute(array(addslashes($_POST['numeroCaseSitue']), addslashes($_POST['numeroPageSitue']),addslashes($_POST['bandeSitue']) , addslashes($_POST['albumReferenceSitue']), addslashes($queryy["jurons_num"])));

                                    //$query_home = databaseconnect()->prepare("INSERT INTO album VALUES (?,?)");
                                    //$query_home->execute(array($_POST['numeroJuronsSitue'],$_POST['contenueJurons'] ));

                                    
                                    echo "success_add";
    }
    else
    {
        echo "existePas";
    }
    }
} 





//addslashes







if ($_POST['action'] == "supprimerJuronsBD") {


    if (!isset($_POST['numeroJuronsSitueSup']) || !isset($_POST['albumReferenceSitueSup']) || !isset($_POST['numeroPageSitueSup']) ||!isset($_POST['numeroCaseSitueSup'])||!isset($_POST['bandeSitueSup'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['numeroJuronsSitueSup'] == '' || $_POST['albumReferenceSitueSup'] == ''||$_POST['numeroPageSitueSup'] == ''||  $_POST['numeroCaseSitueSup'] == ''||  $_POST['bandeSitueSup'] == '') 
    {
        echo "error_add_vide";
        return FALSE;
    }

    $query3 = databaseconnect()->prepare("SELECT jurons_num, jurons_texte FROM jurons WHERE jurons_texte = :jurons_texte ");
    $query3->execute(array(':jurons_texte' => addslashes($_POST['numeroJuronsSitueSup'])));
    $queryy3 = $query3->fetch();

    $query2 = databaseconnect()->prepare("SELECT * FROM se_trouver_bulle WHERE num_case = :num_case AND num_page = :num_page AND place_bande=:place_bande AND  ref_album=:ref_album AND  jurons_num=:jurons_num");
    $query2->execute(array(':num_case' => addslashes($_POST['numeroCaseSitueSup']),':num_page' => addslashes($_POST['numeroPageSitueSup']),':place_bande' => addslashes($_POST['bandeSitueSup']),':ref_album' => addslashes($_POST['albumReferenceSitueSup']),':jurons_num' => addslashes($queryy3['jurons_num'])));
    $queryy2 = $query2->fetch();


    if ($queryy2['num_case'] == $_POST['numeroCaseSitueSup'] && $queryy2['num_page'] == $_POST['numeroPageSitueSup'] && $queryy2['place_bande'] == $_POST['bandeSitueSup'] && $queryy2['ref_album'] == $_POST['albumReferenceSitueSup']  )
    {
        databaseconnect()->query("DELETE FROM se_trouver_bulle WHERE num_case = '". addslashes($_POST['numeroCaseSitueSup'])."' AND num_page = '". addslashes($_POST['numeroPageSitueSup'])."' AND place_bande = '".addslashes($_POST['bandeSitueSup'])."'AND ref_album = '".addslashes($_POST['albumReferenceSitueSup'])."' AND jurons_num = '".addslashes($queryy3['jurons_num'])."'");
        databaseconnect()->query("DELETE FROM case_bulle WHERE case_num = '".addslashes($_POST['numeroCaseSitueSup'])."' AND num_page = '".addslashes($_POST['numeroPageSitueSup'])."' AND place_bande = '".addslashes($_POST['bandeSitueSup'])."'AND ref_album = '".addslashes($_POST['albumReferenceSitueSup'])."' ");
        databaseconnect()->query("DELETE FROM bande WHERE num_page = '". addslashes($_POST['numeroPageSitueSup'])."' AND bande_place = '".addslashes($_POST['bandeSitueSup'])."'AND ref_album = '".addslashes($_POST['albumReferenceSitueSup'])."' ");
        databaseconnect()->query("DELETE FROM page WHERE page_num = '". addslashes($_POST['numeroPageSitueSup'])."' AND ref_album = '".addslashes($_POST['albumReferenceSitueSup'])."'"); 
        echo "success_del";
    }

    else
    {
         echo "pasPresentDansLaBDD";
    }
} 




















if ($_POST['action'] == "ajoutJurons") {

    if (!isset($_POST['contenueJurons'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['contenueJurons'] == '') {
        echo "error_add_vide";
        return FALSE;
    }

    $eau = databaseconnect()->prepare("SELECT * FROM jurons WHERE jurons_texte = :jurons_texte");
    $eau->execute(array(':jurons_texte' => addslashes($_POST['contenueJurons'])));
    $eau2 = $eau->fetch();

    if ($eau2['jurons_texte']== $_POST['contenueJurons'])
    {
        echo "JuronsDejaDansLaBdd";
    }
    else
    {
        $eau = databaseconnect()->prepare("SELECT MAX(jurons_num) FROM jurons");
        $eau3 = $eau->fetch();

     
        $query_home = databaseconnect()->prepare("INSERT INTO jurons VALUES (?,?)");
        $query_home->execute(array($eau3[0], addslashes($_POST['contenueJurons'])));
        echo "success_add";
    }

} 















if ($_POST['action'] == "supprimerJurons") {

    if (!isset($_POST['contenueJuronsSupprimer'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['contenueJuronsSupprimer']=="") 
    {
        echo "error_parametre";
        return FALSE;
    }

    $query = databaseconnect()->prepare("SELECT jurons_num, jurons_texte FROM jurons WHERE jurons_texte = :jurons_texte ");
    $query->execute(array(':jurons_texte' => addslashes($_POST['contenueJuronsSupprimer'])));
    $queryz = $query->fetch();

    $queryL = databaseconnect()->query("SELECT * FROM se_trouver_bulle  WHERE jurons_num = '".addslashes($queryz['jurons_num'])."'");
    $query2 = $queryL->fetch();

    if ($queryz['jurons_texte'] == $_POST['contenueJuronsSupprimer'])
    {
    databaseconnect()->query("DELETE FROM se_trouver_bulle WHERE num_case = '". $query2['num_case']."' AND num_page = '". $query2['num_page']."' AND place_bande = '".$query2['place_bande']."'AND ref_album = '".$query2['ref_album']."' AND jurons_num = '".$queryz['jurons_num']."'");
    databaseconnect()->query("DELETE FROM case_bulle WHERE case_num = '".$query2['num_case']."' AND num_page = '". $query2['num_page']."' AND place_bande = '".$query2['place_bande']."'AND ref_album = '". $query2['ref_album']."' ");
    databaseconnect()->query("DELETE FROM bande WHERE num_page = '".$query2['num_page']."' AND bande_place = '". $query2['place_bande']."'AND ref_album = '". $query2['ref_album']."' ");
    databaseconnect()->query("DELETE FROM page WHERE  page_num = '".$query2['num_page']."' AND ref_album = '".addslashes($query2['ref_album'])."'"); 
    databaseconnect()->query("DELETE FROM jurons WHERE jurons_texte = '".addslashes($_POST['contenueJuronsSupprimer'])."'");

    echo "success_del";
    }



    else
    {
        echo "JuronsInexistant";
    }
} 





















if ($_POST['action'] == "ajoutQuestion") {

    if (!isset($_POST['addQuestion']) || !isset($_POST['addQuestionReponse']) ) 
    {
        echo "error_add_isset";
        return FALSE;
    }

    if ($_POST['addQuestion'] == '' || $_POST['addQuestionReponse'] == '') {
        echo "error_add_vide";
        return FALSE;
    }

    $bdd3 = databaseconnect()->query("SELECT COUNT(idQuestion) FROM question");
    $bdd4 = $bdd3->fetch();
    $bdd4[0] = $bdd4[0] + 1;

    $query_home = databaseconnect()->prepare("INSERT INTO question VALUES (?,?,?)");
    $query_home->execute(array($bdd4[0],addslashes($_POST['addQuestion']), addslashes($_POST['addQuestionReponse'])));
    echo "success_add";


} 

















if ($_POST['action'] == "supprimerQuestion") {

    if (!isset($_POST['idQuestionSup'])) 
    {
        echo "error_add_isset";
        return FALSE;
    }
    if ($_POST['idQuestionSup']== "")
    {
        echo "error_parametre";
        return FALSE;
    }

    $feu = databaseconnect()->prepare("SELECT idQuestion FROM question WHERE idQuestion = :idQuestion");
    $feu->execute(array(':idQuestion' => addslashes($_POST['idQuestionSup'])));
    $feu2 = $feu->fetch();

    if ($feu2['idQuestion'] == $_POST['idQuestionSup'])
    {
    $bdd3 = databaseconnect()->query("DELETE FROM question WHERE idQuestion = '".$_POST['idQuestionSup']."'");    
    echo "success_del";   
    }
    else
    {
        echo "idQuestionInexistant";
    }
    


} 
































































