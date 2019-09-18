
    <?php
        require_once('function.php');
    ?>


<center>
<div class="bv" id="SupprimerBd">
<p style="color:white">Supprimer une BD</p>
<?php
$home3 = databaseconnect()->query("SELECT * FROM album ");
?>
<select id="referenceAlbumSup">
                        <?php 
                        while($re2 = $home3->fetch())
                        {
                                ?> 
                                <option class="option" value="<?php echo $re2['album_ref']?>"><?php echo $re2['album_titre']?></option> 
                                <?php
                        }
                        ?>     
     </select>


<button class="ajoutenvoie fofo"  type="button" id="envoieAjouterBd" onclick="supprimerBd()">valider</button>
<div id="reponse2"></div>
</div>
</center> 