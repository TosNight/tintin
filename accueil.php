<?php
session_start();
?>


<html>
    <?php
        require_once('include/css.php');
        require_once('include/function.php');
        require_once('include/barMenu.php');
    ?>

   
<a href="Accueil_Lecture.php"><div class="blockAccueil" id="Lecture"><p>Lecture</p> <img style="width: auto; height: 100px;" src="image/lecture.png"/></div></a>
<a href="Accueil_Lecture.php"><div class="blockAccueil" id="Jeux"><p>Jeux</p><img style="width: auto; height: 100px;" src="image/manette_jeu.png"/></div></a>
    




    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>