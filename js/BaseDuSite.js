$('.icon-bar a').css('margin-left', '6%');
$("#admin").hide();

function Raffraichir1()
{
    $.ajax({
        url: 'include/boutonRaffraichir1.php',
        dataType: 'html',
        success: function (renvoie, statut)
        {
            $("#Raffraichir1").html(renvoie);
        }
    });
}
function Raffraichir2()
{
    $.ajax({
        url: 'include/boutonRaffraichir2.php',
        dataType: 'html',
        success: function (renvoie, statut)
        {
            $("#Raffraichir2").html(renvoie);
        }
    });
}


Raffraichir1();
Raffraichir2();

function envoieReponse(nbJurons) {
 
  $.ajax({
      url: 'verificationReponse.php',
      type: 'POST',
      data: 'page=' + $("#page").val() + '&bande=' + $("#bande").val() + '&case=' + $("#case").val() + '&jurons=' + $("#jurons").val() ,
      dataType: 'html',

     
      success: function (renvoie, statut) 
      {
        
        console.log($("#page").val());
        console.log($("#bande").val());
        console.log($("#case").val());
        console.log($("#jurons").val());
        console.log(nbJurons);
        $("#bonneReponse").html("");
        $("#mauvaiseReponse").html("");

        if(renvoie == "reussi")
        {
         val = val +1;
         $("#nbReponse").html(val);
         $("#bonneReponse").html("Correct"); 
         getBouton();
         console.log(renvoie);
        
        if (val == nbJurons)
        {
          $("#EndGame2").show();
        }
        }
        
        if(renvoie =="erreur")
        {
          $("#mauvaiseReponse").html("Faux");
          console.log(renvoie);
        }

        if(renvoie =="dejause")
        {
          $("#mauvaiseReponse").html("Déja utilisé");
          console.log(renvoie);
        }
      }
  });
}









function delet(id) {
  $.ajax({
      url: 'nouveauSessionRedirection.php',
      dataType: 'html',
      data: 'album_image=' + id,
      success: function (renvoie, statut) 
      {
        console.log(renvoie);
        
      }
  });
}

val = 0;








function getBouton() {
  $.ajax({
      url: 'verification.php',
      dataType: 'html',
      success: function (renvoie, statut) {
          
      }
  });
}


seconde = 3600;








function off() 
{ 
  
  document.getElementById("overlaye").style.display = "none";
  setInterval(chrono,1000);
 
}





function lol(idQuestion, compteur, question) 
{ 
  
  $.ajax({
    url: 'verificationQuizz.php',
    type: 'POST',
    data: 'idQuestion2=' + idQuestion + '&reponse=' + $("#"+question).val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if (renvoie == "good")
      {
       
       $('#'+compteur).hide();
       $('#'+compteur+'reponse').html("Bonne Réponse");
       $('#'+compteur+'reponse').css('color', 'green');
       console.log(renvoie);

      }
      if(renvoie == "bad")
      {
        $('#'+compteur).hide();
        $('#'+compteur+'reponse').html("Mauvaise Réponse");
        $('#'+compteur+'reponse').css('color', 'red');
        console.log(renvoie);
      }
    }
});  
 

}



action=null;



























function Ajoute() {
  action="ajoute";
  $.ajax({
      url: 'ajoutBDD.php',
      type: 'POST',
      data: 'action=' + action + '&referenceAlbum=' + $("#referenceAlbum").val() + '&titreAlbum=' + $("#titreAlbum").val() + '&dateParution=' + $("#dateParution").val() + '&tome=' + $("#tome").val(),
      dataType: 'html',

     
      success: function (renvoie, statut) 
      {
        if(renvoie == "success_add")
        {
         console.log(renvoie);
         alert("Ajout Reussi");
         $("#referenceAlbum").html("");
         $("#titreAlbum").html("");
         $("#dateParution").html("");
         $("#tome").html("");

        }
      
          console.log(renvoie);
        
        if(renvoie =="error_add_isset")
        {
          console.log(renvoie);
          alert("Un ou plusieurs éléments sont inexistant(s)");
        }
        if(renvoie =="error_add_vide")
        {
          console.log(renvoie);
          alert("Une ou plusieurs cases ne sont remplis correctement");
        }
        if(renvoie =="ComposantExistant")
        {
          console.log(renvoie);
          alert("Un élément existant");
        }

        
      }
  });
}






function supprimerBd() {
  action="supprimerBD";

$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&referenceAlbumSup=' + $("#referenceAlbumSup").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if(renvoie == "success_del")
      {
       console.log(renvoie);
       Raffraichir1();
       alert("BD supprimer");
      }
      
      if(renvoie =="error_add_isset")
      {
        console.log(renvoie);
      }
      if(renvoie =="error_parametre")
      {
        console.log(renvoie);
        alert("La case n'est pas remplie correctement");
      }
      if(renvoie == "existePasDansLaBdd")
      {
        console.log(renvoie);
        alert("Cette référence n'existe pas.");
      }

      
    }
});
}






function jurons() {
    action="jurons";

  $.ajax({
      url: 'ajoutBDD.php',
      type: 'POST',
      data: 'action=' + action + '&numeroJuronsSitue=' + $("#numeroJuronsSitue").val()+ '&albumReferenceSitue=' + $("#albumReferenceSitue").val()+ '&numeroPageSitue=' + $("#numeroPageSitue").val()+ '&numeroCaseSitue=' + $("#numeroCaseSitue").val()+ '&bandeSitue=' + $("#bandeSitue").val(),
      dataType: 'html',

     
      success: function (renvoie, statut) 
      {
        if(renvoie == "success_add")
        {
         console.log(renvoie);
         alert("Ajout juron reussi.");
         $("#numeroJuronsSitue").html("");
         $("#albumReferenceSitue").html("");
         $("#numeroPageSitue").html("");
         $("#numeroCaseSitue").html("");
         $("#bandeSitue").html("");
        }
    
        
        if(renvoie =="error_add_isset")
        {
          console.log(renvoie);
        }
        if(renvoie =="error_add_vide")
        {
          console.log(renvoie);
          alert("Une ou plusieurs cases ne sont remplis correctement.");
        }
        if(renvoie =="dejaPresentDansLaBd")
        {
          console.log(renvoie); 
           alert("Juron deja present a cette endroit.");
        }
        if(renvoie == "existePas" )
        {
          console.log(renvoie); 
           alert("erreur de saisie.");
        }
        
      }
  });
}

function supprimerJuronsBD() {
  action="supprimerJuronsBD";
$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&numeroJuronsSitueSup=' + $("#numeroJuronsSitueSup").val()+ '&albumReferenceSitueSup=' + $("#albumReferenceSitueSup").val()+ '&numeroPageSitueSup=' + $("#numeroPageSitueSup").val()+ '&numeroCaseSitueSup=' + $("#numeroCaseSitueSup").val()+ '&bandeSitueSup=' + $("#bandeSitueSup").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if(renvoie == "success_del")
      {
       console.log(renvoie);
       alert("Juron Supprimer.");
       $("#numeroJuronsSitueSup").html("");
       $("#albumReferenceSitueSup").html("");
       $("#numeroPageSitueSup").html("");
       $("#numeroCaseSitueSup").html("");
       $("#bandeSitueSup").html("");
      }
      
      if(renvoie =="error_add_isset")
      {
        console.log(renvoie);
      }
      if(renvoie =="error_add_vide")
      {
        console.log(renvoie);
        alert("Une ou plusieurs cases ne sont remplis correctement.");
      }
      if(renvoie =="pasPresentDansLaBDD")
      {
        console.log(renvoie);
        alert("Ce juron n'est pas présent dans la base de données.");
      }

    }
});
}






function ajoutJurons() {
  action="ajoutJurons";
$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&contenueJurons=' + $("#contenueJurons").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if(renvoie == "success_add")
      {
       console.log(renvoie);
       alert("Ajout juron reussi.");
       $("#contenueJurons").html("");
      }
      
      if(renvoie =="error_add_isset")
      {
        console.log(renvoie);
      }
      if(renvoie =="error_add_vide")
      {
        console.log(renvoie);
        alert("La case n'est pas remplis correctement..");

      }
      if(renvoie =="JuronsDejaDansLaBdd")
      {
        console.log(renvoie);
        alert("Juron existant.");
      }

      
    }
});
}


function supprimerJurons() {
  action="supprimerJurons";
$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&contenueJuronsSupprimer=' + $("#contenueJuronsSupprimer").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {

       console.log(renvoie);

    }
});
}





function ajoutQuestion() {
  action="ajoutQuestion";
$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&addQuestion=' + $("#addQuestion").val() + '&addQuestionReponse=' + $("#addQuestionReponse").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if(renvoie == "success_add")
      {
       console.log(renvoie);
       alert("Question ajouté.");
       $("#addQuestion").html("");
       $("#addQuestionReponse").html("");
       
      }
      
      if(renvoie =="error_add_isset")
      {
        console.log(renvoie);
      }
      if(renvoie =="error_add_vide")
      {
        console.log(renvoie);
        alert("Une ou plusieurs cases ne sont remplis correctement.");
      }

      
    }
});
}


function supprimerQuestion() {
  action="supprimerQuestion";
$.ajax({
    url: 'ajoutBDD.php',
    type: 'POST',
    data: 'action=' + action + '&idQuestionSup=' + $("#idQuestionSup").val(),
    dataType: 'html',

   
    success: function (renvoie, statut) 
    {
      if(renvoie == "success_del")
      {
       console.log(renvoie);
       alert("Suppresion de la question reussi.");
       Raffraichir2();
      }
      
      if(renvoie =="error_add_isset")
      {
        console.log(renvoie);
      }
      if(renvoie =="error_parametre")
      {
        console.log(renvoie);
        alert("La case n'est pas remplis correctement.");
      }
      if(renvoie =="idQuestionInexistant")
      {
        console.log(renvoie);
        alert("Id de la Question est inexistante dans a base de donnée.");
      }
  


      
    }
});
}


function chrono()
{
 
  
  if (seconde != 0)
  {
  
     seconde = seconde - 1;
     $("#temps").html(seconde); 

  }
  else 
  {  
    $("#EndGame").show();
    $("#textFin").html(val);
    clearTimeout(chrono); 
  
  }
}