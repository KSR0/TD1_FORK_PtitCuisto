<?php ob_start();?>



<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Gerer votre compte</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Changez votre mot de passe / supprimer votre compte</p><br>

<form action="index.php?action=requete_changement_mdp" method="post">

   <div>
  	<label for="old_password">Votre ancien mot de passe : </label>
  	<input type="password" id="old_password" name="old_password"/>
   </div>

   <div>
  	<label for="new_password">Votre nouveau mot de passe : </label>
  	<input type="password" id="new_password" name="new_password"/>
   </div>

   <div>
  	<label for="new_password_conf">Confirmez votre nouveau mot de passe : </label>
  	<input type="password" id="new_password_conf" name="new_password_conf"/>
   </div>
   
   <br>
   <div id="erreur" class="text-red-600"></div>
   <br>
   <div>
  	<input type="submit" id="submit_btn" class="text-charte_bleu_clair border border-charte_bleu_fonce focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 opacity-50" disabled/>
   </div>
</form>

<br> <!-- FAIRE AFFICHER UN POP-UP POUR CONFIRMATION -->
<a href="index.php?action=suppr_compte" id="btn-suppr-compte-user" class="text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2" >Supprimer votre compte</a>

<script>
    let old_password = document.querySelector('#old_password');
    let new_password = document.querySelector('#new_password');
    let new_password_conf = document.querySelector('#new_password_conf');
    let btnSubmit = document.querySelector('#submit_btn');
    let erreursDiv = document.querySelector("#erreur");
    erreursDiv.innerHTML = "L'ancien mot de passe ne peut pas etre vide.";

    old_password.addEventListener("input", function () {
        let old_password_value = document.querySelector('#old_password').value;
        let new_password_value = document.querySelector('#new_password').value;
        let new_password_conf_value = document.querySelector('#new_password_conf').value;

        if (old_password_value == '') {
            erreursDiv.innerHTML = "L'ancien mot de passe ne peut pas etre vide.";
        } else {
            erreursDiv.innerHTML = "";
        }
    });

    new_password.addEventListener("input", function () {
        let old_password_value = document.querySelector('#old_password').value;
        let new_password_value = document.querySelector('#new_password').value;
        let new_password_conf_value = document.querySelector('#new_password_conf').value;

        if (new_password_value == new_password_conf_value) {
            btnSubmit.disabled = false;
            btnSubmit.className = "text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "text-charte_bleu_clair border border-charte_bleu_fonce focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 opacity-50";
            erreursDiv.innerHTML = "Les deux mots de passe ne correspondent pas";
        }
    });

    new_password_conf.addEventListener("input", function () {
        let old_password_value = document.querySelector('#old_password').value;
        let new_password_value = document.querySelector('#new_password').value;
        let new_password_conf_value = document.querySelector('#new_password_conf').value;
        
        if (new_password_conf_value == new_password_value) {
            btnSubmit.disabled = false;
            btnSubmit.className = "text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "text-charte_bleu_clair border border-charte_bleu_fonce focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2 opacity-50";
            erreursDiv.innerHTML = "Les deux mots de passe ne correspondent pas";
        }
    });

</script>



<?php $content = ob_get_clean();
require_once('template.php');
?>

