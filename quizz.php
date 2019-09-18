<?php
session_start();
?>

<div class="Fin" id="overlay">
        <center><div style="color:white" id="nbReponseQuizz"></div></center>
        <div id="text"style="color:white" ><p>La reponse a la question 1 est : tintin <br> La reponse a la question 2 est : Rastapopoulos <br> La reponse a la question 3 est : Milou <br> La reponse a la question 4 est : Le Colonel Boris </p></div>
</div>

<html>
    <?php
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>

<center> <p style="color:white; font-size:80px;"> Quizz </p> </center>

<?php
            $compteur = 0;
            $query_home = databaseconnect()->query("SELECT * FROM question");
            while($result_query_home = $query_home->fetch()){
            $compteur = $compteur + 1;
               ?>
                <div class="blockQuizz" id="bouton_block">
                    <p><?= $result_query_home['questionText'] ?></p>
                    <br>

                    <input class="roro" type="text" id="<?php echo $compteur?>question"/>
              <br>
              
               <center><button id="<?php echo $compteur?>" class="fofo" onclick="lol('<?php echo $result_query_home['idQuestion'] ?>' , '<?php echo $compteur ?>', '<?php echo $compteur ?>question')">Reponse</button></center>
               <a id="<?php echo $compteur?>reponse"> </a>

                </div>
        <?php

            }
        ?>

           






    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>