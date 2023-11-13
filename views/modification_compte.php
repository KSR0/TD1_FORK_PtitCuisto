<?php ob_start();?>



<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Modifier mon compte</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Changez votre mot de passe / supprimer votre compte</p><br>
<!-- Appel des fichiers où sont rédigées les fonctions JS -->


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->
<?php
    echo "
        <h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Mon compte</h1>

            <div class='flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0'>

                <div class='w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0'>

                    <div class='border-2 border-charte_bleu_fonce rounded-lg p-2 space-y-4 md:space-y-6 sm:p-8'>
                        
                        <form action='index.php?action=requete_creation_compte' id='signupForm' method='post' class='space-y-4 md:space-y-6'>

                            <div>
                                <label for='pseudo' class='text-charte_bleu_fonce block text-sm font-medium'>Status du compte :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->sta_intitule . "</p>
                                </div>

                            </div>

                            <div>
                                <label for='pseudo' class='text-charte_bleu_fonce block text-sm font-medium'>Pseudo :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_pseudo . "</p>
                                </div>

                            </div>

                            <div>
                                <label for='nom' class='text-charte_bleu_fonce block text-sm font-medium'>Nom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_nom . "</p>
                                </div>
                            </div>

                            <div>
                                <label for='prenom' class='text-charte_bleu_fonce block text-sm font-medium'>Prénom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-file-earmark-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_prenom . "</p>
                                </div>

                            </div>
                            
                            <div>
                                <label for='email' class='text-charte_bleu_fonce block text-sm font-medium'>Adresse mail :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-envelope-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_email . "</p>
                                </div>

                            </div>

                            <div>
                                <label for='password' class='text-charte_bleu_fonce block text-sm font-medium'>Date d'inscription :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-backspace-reverse-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_date_ins . "</p>
                                </div>

                            </div>

                            <div>
                                <label for='confirm-password' class='text-charte_bleu_fonce block text-sm font-medium'>Date de dernière modification :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-check-circle-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_date_modif . "</p>
                                </div>

                            </div>

                            <button class='font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce'>
                                <i class='bi bi-box-arrow-right'></i>
                                <p class='ml-2'>Modifier mon compte</p>
                            </button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>";
?>

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

