<?php
        require_once('function.php');
?>

<center>
<div  class="bv" id="supprimerUneQuestion">
<p style="color:white">Supprimer une question</p>

<?php
$home3 = databaseconnect()->query("SELECT * FROM question ");
?>
<select id="idQuestionSup">
                        <?php 
                        while($re2 = $home3->fetch())
                        {
                                ?> 
                                <option class="option" value="<?php echo $re2['idQuestion']?>"><?php echo $re2['questionText']?></option> 
                                <?php
                        }
                        ?>     
     </select>

<button class="ajoutenvoie fofo" type="button" id="envoieAjouterJurons" onclick="supprimerQuestion()">Valider</button>
<div id="reponse8"></div>
</div>
</center>