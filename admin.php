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

<center><h1 style="color:white">Bienvenue sur l'interface administrateur </h1></center>

<br>
<br>

<center><h2 style="color:white">Informations depuis la base de donnée</h2></center>

<center>
<a style="color:green;" href=bddBD.php>BD informations</a>
<a style="color:red;" href=bddJurons.php>Jurons informations</a>
<a style="color:blue;" href=bddQuizz.php>Quizz informations</a>
</center>

<center><h2 style="color:white">BD</h2></center>

<center>
<div class="bv" id="ajouterBd">
<p style="color:white">Ajouter une BD</p>
<input class="ajout roro" placeholder="reference album" id="referenceAlbum" maxlength="3" minlenght="3"><br>
<input class="ajout roro"  placeholder="Titre de l'album" id="titreAlbum"><br>
<input class="ajout roro" type="number" placeholder="Date de parution" id=dateParution maxlength="4" minlenght="4"><br>
<input class="ajout roro" placeholder="Numéro du tome" type="number" id="tome"><br>
<button class="ajoutenvoie fofo"  type="button" id="envoieAjouterBd" onclick="Ajoute()">valider</button>
</div>
</center>

<br>

<div id="Raffraichir1"></div>


<br>

<center>
<div class="bv" id="ajouterUnJuron">
<p style="color:white">Ajouter un juron dans la BD</p>
<input class="ajout roro"  placeholder="Jurons" id="numeroJuronsSitue"> <br>
<input class="ajout roro"   placeholder="Reference" id="albumReferenceSitue">  <br>
<input class="ajout roro"   placeholder="Page" type="number"  id="numeroPageSitue"> <br>
<input class="ajout roro"  placeholder="Case"  type="number"  id="numeroCaseSitue"> <br>
<input class="ajout roro"  placeholder="Bande" id="bandeSitue"><br>
<button class="ajoutenvoie fofo" type="button" id="envoieAjouterJurons" onclick="jurons()">Valider</button>
</div>
</center>

<br>

<center>
<div class="bv" id="supprimerJuronsBD">
<p style="color:white">Supprimer un juron d'une BD</p>
<input class="ajout roro"  placeholder="Jurons" id="numeroJuronsSitueSup"><br>
<input class="ajout roro"   placeholder="Reference" id="albumReferenceSitueSup"><br>
<input class="ajout roro"  placeholder="Page" type="numbre"  id="numeroPageSitueSup"><br>
<input class="ajout roro"   placeholder="Case" type="numbre" id="numeroCaseSitueSup"><br>
<input class="ajout roro"  placeholder="Bande" id="bandeSitueSup"><br>
<button class="ajoutenvoie fofo"  type="button" id="envoieAjouterBd" onclick="supprimerJuronsBD()">valider</button>
</div>
</center>



<br>

<center>
<div  class="bv" id="AjouterUnJuron">
<p style="color:white">Ajouter un juron a la base de donnée</p>
<input class="ajout roro"  placeholder="Jurons" id="contenueJurons"><br>
<button class="ajoutenvoie fofo" type="button" id="envoieAjouterJurons" onclick="ajoutJurons()">Valider</button>
</div>
</center>

<br>

<center>
<div  class="bv" id="SuprimerUnJuron">
<p style="color:white">Supprimer un juron</p>
<input class="ajout roro"  placeholder="Jurons" id="contenueJuronsSupprimer"><br>
<button class="ajoutenvoie fofo" type="button" id="envoieAjouterJurons" onclick="supprimerJurons()">Valider</button>
</div>
</center>

<br>

<center><h2 style="color:white">Quizz</h2></center>

<br>

<center>
<div  class="bv" id="ajouterUneQuestion">
<p style="color:white">Ajouter une question</p>
<input class="ajout roro"  placeholder="Question" id="addQuestion"><br>
<input class="ajout roro"  placeholder="Réponse" id="addQuestionReponse"><br>
<button class="ajoutenvoie fofo" type="button" id="envoieAjouterJurons" onclick="ajoutQuestion()">Valider</button>
</div>
</center>

<br>

<div id="Raffraichir2"></div>

<!--- image pour montrer exemple --->



    <?php
        require_once('include/js.php');
    ?>
</html>
<script src="js/BaseDuSite.js"></script>