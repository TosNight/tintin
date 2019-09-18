<?php
session_start();
?>

<html>

    <?php
       
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>
       <button type="button" class="changePage" id="previous" onclick="plusSlides(-1)">Precedent</button>
         <button type="button" class="changePage" id="next" onclick="plusSlides(1)">Suivant</button> 
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

  

    <?php
        require_once('include/js.php');
        
    ?>
    <script src="js/lecture.js"></script>
    <script src="js/BaseDuSite.js"></script>
    
</html>



