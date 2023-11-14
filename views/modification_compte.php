<?php ob_start();?>



<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<?php
    if ($_SESSION['typ_id'] != 1) { // L'utilisateur n'est pas un admin donc il doit pouvoir supprimer son compte
        echo "<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Modifiez votre compte</h1>
            <div class='flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0'>

                <div class='w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0'>

                    <div class='border-2 border-charte_bleu_fonce rounded-lg p-4 space-y-4 md:space-y-6 sm:p-8'>

                        <form action='index.php?action=requete_creation_compte' id='signupForm' method='post' class='space-y-4 md:space-y-6'>

                            <div>
                                <label for='pseudo' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier mon pseudo :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-file-earmark-person-fill'></i>
                                    <input type='pseudo' name='pseudo' id='pseudo' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_pseudo' placeholder='Exemple : mon_pseudo' required=''/>
                                </div>
                            </div>

                            <div>
                                <label for='nom' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier mon nom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <input type='nom' name='nom' id='nom' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_nom' placeholder='Exemple : Cuisto' required=''/>
                                </div>
                            </div>

                            <div>
                                <label for='prenom' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier mon prénom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <input type='prenom' name='prenom' id='prenom' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_prenom' placeholder='Exemple : Ptit' required=''/>
                                </div>
                            </div>
                            
                            <div>
                                <label for='email' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier mon adresse mail :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-envelope-fill'></i>
                                    <input type='mail 'name='email' id='email' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_email' placeholder='Exemple : votreemail@ptitcuisto.fr' required=''/>
                                </div>
                            </div>

                            <form action='index.php?action=requete_changement_mdp' method='post'>

                                <div>
                                    <label for='old_password' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Entrez votre ancien mot de passe : </label>
                                    <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                        <i class='bi bi-backspace-reverse-fill'></i>
                                        <input type='password' id='old_password' name='old_password' class='text-lg w-full ml-2 focus:outline-none' value='' placeholder='Exemple : votre_mdp_1234' required=''/>
                                    </div>
                                </div>

                                <div>
                                    <label for='new_password' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Entrez votre nouveau mot de passe : </label>
                                    <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                        <i class='bi bi-question-circle-fill'></i>
                                        <input type='password' id='new_password' name='new_password' class='text-lg w-full ml-2 focus:outline-none' placeholder='Exemple : votre_nouveau_mdp_1234' required=''/>
                                    </div>
                                </div>

                                <div>
                                    <label for='new_password_conf' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Confirmez votre nouveau mot de passe : </label>
                                    <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                        <i class='bi bi-check-circle-fill'></i>
                                        <input type='password' id='new_password_conf' name='new_password_conf' class='text-lg w-full ml-2 focus:outline-none' placeholder='Exemple : votre_nouveau_mdp_1234' required=''/>
                                    </div>
                                </div>

                                <div id='erreur' class='text-center text-xl'></div>

                                <div>
                                    <button type='submit' id='submit_btn' class='font-permanent_marker w-full cursor-not-allowed p-2.5 -mb-3 flex justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_clair hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4' disabled>Modifier mon mot de passe</button>
                                </div>
                            </form>

                            <div>
                                <button class='font-permanent_marker cursor-pointer p-2.5 -mb-5 w-full flex justify-center rounded-md px-2 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce hover:border-4'>
                                    <p>Sauvegarder les changements</p>
                                </button><br> <!-- FAIRE AFFICHER UN POP-UP POUR CONFIRMATION -->
                                <a href='index.php?action=suppr_compte' id='btn-suppr-compte-user' class='font-permanent_marker w-full cursor-pointer p-2.5 flex justify-center rounded-md px-2 border-2 text-charte_bleu_clair border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4'>Supprimer votre compte</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    } else {
        echo "<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Modifier le compte de $compte->user_pseudo</h1>
            <div class='flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0'>

                <div class='w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0'>

                    <div class='border-2 border-charte_bleu_fonce rounded-lg p-4 space-y-4 md:space-y-6 sm:p-8'>

                        <form action='index.php?action=requete_creation_compte' id='signupForm' method='post' class='space-y-4 md:space-y-6'>

                            <div>
                                <label for='pseudo' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier le pseudo de l'utilisateur :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-file-earmark-person-fill'></i>
                                    <input type='pseudo' name='pseudo' id='pseudo' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_pseudo' placeholder='Exemple : mon_pseudo' required=''/>
                                </div>
                            </div>

                            <div>
                                <label for='nom' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier son nom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <input type='nom' name='nom' id='nom' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_nom' placeholder='Exemple : Cuisto' required=''/>
                                </div>
                            </div>

                            <div>
                                <label for='prenom' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier son prénom :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <input type='prenom' name='prenom' id='prenom' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_prenom' placeholder='Exemple : Ptit' required=''/>
                                </div>
                            </div>
                            
                            <div>
                                <label for='email' class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Modifier son adresse mail :</label>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-envelope-fill'></i>
                                    <input type='mail 'name='email' id='email' class='text-lg w-full ml-2 focus:outline-none' value='$compte->user_email' placeholder='Exemple : votreemail@ptitcuisto.fr' required=''/>
                                </div>
                            </div>

                            <div>
                                <button class='font-permanent_marker cursor-pointer p-2.5 -mb-5 w-full flex justify-center rounded-md px-2 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce hover:border-4'>
                                    <p>Sauvegarder les changements</p>
                                </button><br>
                                <a href='index.php?action=suppr_compte' id='btn-suppr-compte-user' class='font-permanent_marker w-full cursor-pointer p-2.5 flex justify-center rounded-md px-2 border-2 text-charte_bleu_clair border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4'>Supprimer le compte</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>";
    }
?>

<script>
    let old_password = document.querySelector('#old_password');
    let new_password = document.querySelector('#new_password');
    let new_password_conf = document.querySelector('#new_password_conf');
    let btnSubmit = document.querySelector('#submit_btn');
    let erreursDiv = document.querySelector("#erreur");

    old_password.addEventListener("input", function () {
        let old_password_value = document.querySelector('#old_password').value;
        let new_password_value = document.querySelector('#new_password').value;
        let new_password_conf_value = document.querySelector('#new_password_conf').value;

        if (old_password_value == '') {
            erreursDiv.innerHTML = "<p class='text-charte_bleu_fonce'><span class='font-permanent_marker'>Erreur :</span> L'ancien mot de passe ne peut pas etre vide.</p>";
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
            btnSubmit.className = "font-permanent_marker w-full cursor-pointer p-2.5 -mb-3 flex justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_clair hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "font-permanent_marker w-full cursor-not-allowed p-2.5 -mb-3 flex justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_clair hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4";
            erreursDiv.innerHTML = "<p class='text-charte_bleu_fonce'><span class='font-permanent_marker'>Erreur :</span> Les deux mots de passe ne correspondent pas.</p>";
        }
    });

    new_password_conf.addEventListener("input", function () {
        let old_password_value = document.querySelector('#old_password').value;
        let new_password_value = document.querySelector('#new_password').value;
        let new_password_conf_value = document.querySelector('#new_password_conf').value;
        
        if (new_password_conf_value == new_password_value) {
            btnSubmit.disabled = false;
            btnSubmit.className = "font-permanent_marker w-full cursor-pointer p-2.5 -mb-3 flex justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_clair hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4";
            erreursDiv.innerHTML = "";
        } else {
            btnSubmit.disabled = true;
            btnSubmit.className = "font-permanent_marker w-full cursor-not-allowed p-2.5 -mb-3 flex justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_clair hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4";
            erreursDiv.innerHTML = "<p class='text-charte_bleu_fonce'><span class='font-permanent_marker'>Erreur :</span> Les deux mots de passe ne correspondent pas.</p>";
        }
    });

</script>



<?php $content = ob_get_clean();
require_once('template.php');
?>

