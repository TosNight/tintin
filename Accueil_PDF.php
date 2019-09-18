<?php
session_start();
?>


<html>
    <?php
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>

    <center> <p style="color:white; font-size:80px;"> PDF </p> </center>

    <?php   
        $compteur = null;
        $table = '<table align="center" cellspacing="10" width="1080"><tr>'."\n";  
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

                $compteur = $compteur +1;
                $nbr = 4;
                $val2 = substr($val, 0, -$nbr);

                $nbr2 = 4;
                $val9 = substr($val, 7, -$nbr2);

                $val3 = "'$val2'";

                
                $table = '<td><div id="div"> <a href="tintin.pdf/'.$val9.'.pdf"><img id="imageAccueil" src="'.$dir.'/'.$val.'"/><a><br>'."\n";   
                $bdd = databaseconnect()-> query("SELECT album_titre, album_parution, album_tome FROM album WHERE album_image = '".$val2."'"); 
                $bdd2 = $bdd->fetch();
                $table .= '<a style="color:#fff">Titre : '.$bdd2['album_titre'].'</a><br>'."\n";     
                $table .= '<a style="color:#fff">Année de parution : '.$bdd2['album_parution'].'</a><br>'."\n";     
                $table .= '<a style="color:#fff">Tome numéro : '.$bdd2['album_tome'].'</a></div>'."\n";    
                 
                
        
                echo $table;
            }  
            
        }  
         
        
    ?>




    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>