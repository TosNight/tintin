<?php
session_start();
?>


<html>
    <?php
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>

    <center> <p style="color:white; font-size:80px;"> Lecture </p> </center>

    <?php   
        $liste = array(); 
        $dir="images/";
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
            

            foreach ($liste as $val) 
            { 
                
                $nbr = 4;
                $val2 = substr($val, 0, -$nbr);
                $val3 = "'$val2'";
                
                $bdd = databaseconnect()-> query("SELECT album_titre, album_parution, album_tome FROM album WHERE album_image = '".$val2."'"); 
                $bdd2 = $bdd->fetch();

                if ($bdd2[0]==null)
                {

                }
                else
                {
                $table = '<td><div id="div"> <a href="Tintin_Lecture.php"><img id="imageAccueil" onclick="delet('.$val3.')" src="'.$dir.'/'.$val.'"/><a><br>'."\n";   
                $table .= '<a style="color:#fff">Titre : '.$bdd2['album_titre'].'</a><br>'."\n";     
                $table .= '<a style="color:#fff">Année de parution : '.$bdd2['album_parution'].'</a><br>'."\n";     
                $table .= '<a style="color:#fff">Tome numéro : '.$bdd2['album_tome'].'</a><br></div></td>'."\n";
                
           
                echo $table;
                }

            }  
            
        }  
         
        
    ?>




    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>