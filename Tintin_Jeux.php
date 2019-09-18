<?php
session_start();
$_SESSION['reponseTotal'] = array();
        require_once('include/css.php');
        require_once('include/function.php');
?>

<html>
        

        <div class="Debut" id="overlaye" onclick="off()">
       
        <center><div id="text">Bienvenue sur le petit jeux de tintin.<br> Trouver les Jurons de Mr Hadock en moins d'une heure. <br> Voici les différentes informations qui peuvent vous êtres utiles. <img src="image/RegleJeux.png"/><br> Le jeu commencera quand vous cliquerez. <br><br> bonne chance.</div></center>
       
        </div>

        <div class="Fin" id="EndGame">
                <center><div id="text" style="color:white" ><label>Fin du jeu vous avez trouver </label> <label id="textFin"></label> <label> Reponse</label><center>

                        <center><a href="index.php"><button  class="fofo" style="cursor: pointer;" type="button" >Aller sur la page d'accueil</button></a></center>
                        <?php 
                        $bdd3 = databaseconnect()->query("SELECT jurons_texte FROM se_trouver_bulle, jurons WHERE jurons.jurons_num = se_trouver_bulle.jurons_num AND se_trouver_bulle.ref_album = '".$_SESSION['album_ref']."'");
                        $bdd4 = $bdd3->fetch();
                        var_dump($bdd4);
                        ?>
                        
                </div>
        </div>

        <div class="Fin" id="EndGame2">
                <center><div id="text" style="color:white" ><label>Bravo vous avez trouvé tous les jurons.</label><center>

                        <center><a href="index.php"><button  class="fofo" style="cursor: pointer;" type="button" >Aller sur la page d'accueil</button></a></center>
                        <?php 
                        $bdd3 = databaseconnect()->query("SELECT jurons_texte FROM se_trouver_bulle, jurons WHERE jurons.jurons_num = se_trouver_bulle.jurons_num AND se_trouver_bulle.ref_album = '".$_SESSION['album_ref']."'");
                        $bdd4 = $bdd3->fetch();
                        var_dump($bdd4);
                        ?>
                        
                </div>
        </div>


    <?php
       
        
        require_once('include/barMenu.php');
    ?>

        
        


        
       <button type="button" class="changePage" id="previous" onclick="plusSlides(-1);">Precedent</button>
         <button type="button" class="changePage" id="next" onclick="plusSlides(1)">Suivant</button> 
         <center><div id =temps style="color:white"></div></center>

    <?php

        $table = '<div class="slideshow-container">'."\n"; 
        $liste = array(); 
        $garde = $_SESSION['album_image'];
        $dir = "tintin.png/";
        $dir .= $garde;
        if ($dossier = opendir($dir)) 
        {  

            while (($item = readdir($dossier)) != false) 
            {  
                $liste[] = $item;  
            } 

            closedir($dossier);  
            unset($liste[0]);
            unset($liste[1]);
            $liste = array_values($liste);
            
            natcasesort($liste);
$liste = array_values($liste);

            foreach ($liste as $val) 
            {   
                    $rest = substr($val, 0, -4); 
                    $table .= '<div class="mySlides">'."\n"; 
                    $table .= '<br><br><center><a class="page" style="color:white"> '.$rest.' </a></center>'."\n";
                    $table .= '<img id="imageTintin" onclick="plusSlides(1)" src="'.$dir.'/'.$val.'"/>'."\n"; 
                    $table .= '</div>'."\n"; 
                    
            
            } 
         
           $table .='</div>'."\n"; 
           echo $table;
            
            
        }  
    ?>

    <div id="jeux">    
    <center>
    <a id="nbReponse" style="color:white"></a>
    <a id= "nbrJuronsBdReponse" value="<?php echo $_SESSION['nbrJuronsBd']; ?>" style="color:white"> / <?php echo $_SESSION['nbrJuronsBd']; ?> Reponse(s)</a>
    </center>
    <br>

   
       
  
     
<?php
  $home = databaseconnect()->prepare("SELECT DISTINCT page_num FROM page WHERE ref_album = :ref_album");
  $home->execute(array(':ref_album' => $_SESSION['album_ref'])); 
  
  $home2 = databaseconnect()->prepare("SELECT DISTINCT bande_place FROM bande WHERE ref_album = :ref_album");
  $home2->execute(array(':ref_album' => $_SESSION['album_ref'])); 

  $home4 = databaseconnect()->prepare("SELECT DISTINCT case_num FROM case_bulle WHERE ref_album = :ref_album");
  $home4->execute(array(':ref_album' => $_SESSION['album_ref'])); 
  
  $home3 = databaseconnect()->prepare("SELECT DISTINCT jurons_texte FROM se_trouver_bulle, jurons WHERE ref_album = :ref_album AND jurons.jurons_num = se_trouver_bulle.jurons_num ");
  $home3->execute(array(':ref_album' => $_SESSION['album_ref'])); 
?>


<center>
    <select id="page">
                        <option value="faux">--Choissisez la page : --</option>
                        <?php 
                        while($re = $home->fetch())
                        {
                                ?> 
                                <option value="<?php echo $re['page_num']?>"><?php echo $re['page_num']?></option> 
                                <?php
                        }
                        ?>     
     </select>

     <select id="bande">
                        <option value="faux">--Choissisez la bande : --</option>
                        <?php 
                        while($re = $home2->fetch())
                        {
                                ?> 
                                <option value="<?php echo $re['bande_place']?>"><?php echo $re['bande_place']?></option> 
                                <?php
                        }
                        ?>     
     </select>
     <select id="case">
                        <option value="faux">--Choissisez la case : --</option>
                        <?php 
                        while($re = $home4->fetch())
                        {
                                ?> 
                                <option value="<?php echo $re['case_num']?>"><?php echo $re['case_num']?></option> 
                                <?php
                        }
                        ?>     
     </select>
     <select id="jurons">
                        <option value="faux">--Choissisez le juron : --</option>
                        <?php 
                        while($re2 = $home3->fetch())
                        {
                                ?> 
                                <option class="option" value="<?php echo $re2['jurons_texte']?>"><?php echo $re2['jurons_texte']?></option> 
                                <?php
                        }
                        ?>     
     </select>
</center>     
<center> <p style="color: green" id="bonneReponse"></p></center>
     <center> <p style="color: red" id="mauvaiseReponse"></p></center>
   
     <center> <button type="button" id="essai"  class="fofo" onclick="envoieReponse(<?php echo $_SESSION['nbrJuronsBd']?>)">Valider</button></center>


    </div>

    <div id=toto></div>
    
    
    <?php
        
        require_once('include/js.php');
    ?>
    <script src="js/BaseDuSite.js"></script>
    <script src="js/lecture.js"></script>
</html>



