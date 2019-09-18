<?php
session_start();
?>


<html>
    <?php
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>
<br>
<br>
<br>

<center><h1 style="color:white;"> Information Album BD <h1></center>

<br>
            <?php
            $query = databaseconnect() -> query('SELECT * FROM album');
            while ($ReponseQuery = $query->fetch())
            {
                ?>
                
              <?php   
              $table = '<div style="color:white" class="blockBDD"> <a style="color:#fff">Titre : '.$ReponseQuery['album_titre'].'</a><br>'."\n";
              $table .= '<a style="color:#fff">Date Parution : '.$ReponseQuery['album_parution'].'</a><br>'."\n";  
              $table .= '<a style="color:#fff">Tome : '.$ReponseQuery['album_tome'].'</a><br>'."\n";  
              $table .= '<a style="color:#fff">Album : '.$ReponseQuery['album_image'].'</a><br>'."\n"; 
              $table .= '<a style="color:#fff">Reference : '.$ReponseQuery['album_ref'].'</a></div>'."\n";  
              echo $table;

              
              ?>   
               
                <?php
            } 
           
            ?>    
 


    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>