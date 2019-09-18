<?php
        session_start();
        require_once('include/function.php');
                
                $bdd = databaseconnect()->query("SELECT jurons_texte  FROM jurons, se_trouver_bulle  WHERE jurons_texte = '".addslashes($_POST['jurons'])."' AND ref_album = '".$_SESSION['album_ref']."' AND se_trouver_bulle.jurons_num = jurons.jurons_num"); 
                $bdd2 = $bdd->fetch();

                $bdd10 = databaseconnect()->query("SELECT jurons_num  FROM jurons WHERE jurons_texte = '".addslashes($_POST['jurons'])."'"); 
                $bdd11 = $bdd10->fetch();

                $bdd3 = databaseconnect()->prepare("SELECT *  FROM se_trouver_bulle  WHERE num_case = :num_case AND num_page = :num_page AND place_bande = :place_bande AND ref_album = :ref_album AND jurons_num = :jurons_num"); 
                $bdd3 ->execute(array(':num_case' => $_POST['case'], ':num_page' => $_POST['page'], ':place_bande' => $_POST['bande'], ':ref_album' => $_SESSION['album_ref'],':jurons_num' =>  $bdd11['jurons_num']));
                $bdd4 = $bdd3->fetch();

                        
                if ($bdd2['jurons_texte'] == $_POST['jurons'] && $bdd4['num_page'] == $_POST['page'] && $bdd4['num_case'] == $_POST['case'] && $bdd4['place_bande'] == $_POST['bande'])
                {

                        if(in_array($_POST['jurons'],$_SESSION['reponseTotal']))
                        {
                                echo 'dejause';
                        } 
                        else
                        {
                                array_push($_SESSION['reponseTotal'], $_POST['jurons'] );
                                echo "reussi";    
                        }
                }
                else
                {
                echo "erreur";
                }