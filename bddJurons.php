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
            $query = databaseconnect() -> query('SELECT * FROM jurons ORDER BY jurons_num ASC');
            while ($ReponseQuery = $query->fetch())
            {
                ?>
                
              <?php   
              $table = '<div style="color:white" class="blockBDD"> <a style="color:#fff">Numero Juron : '.$ReponseQuery['jurons_num'].'</a><br>'."\n";
              $table .= '<a style="color:#fff">Contenue Jurons : '.$ReponseQuery['jurons_texte'].'</a><br></div>'."\n";  
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