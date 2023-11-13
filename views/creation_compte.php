<?php ob_start();?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->
<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Créer mon compte</h1>
<div class="flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0">

    <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">

        <div class="border-2 border-charte_bleu_fonce rounded-lg p-4 space-y-4 md:space-y-6 sm:p-8">
            
            <form action="index.php?action=requete_creation_compte" id="signupForm" method="post" class="space-y-4 md:space-y-6">

                <div>
                    <label for="pseudo" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Entrez votre pseudo :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class='bi bi-person-rolodex'></i>
                        <input type="text" name="pseudo" id="pseudo" class="text-lg w-full ml-2 focus:outline-none" placeholder="Exemple : mon_pseudo" required="">
                    </div>

                </div>

                <div>
                    <label for="nom" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Entrez votre nom :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class="bi bi-person-fill"></i>
                        <input type="nom" name="nom" id="nom" class="text-lg w-full ml-2 focus:outline-none" placeholder="Exemple : Cuisto" required="">
                    </div>

                </div>

                <div>
                    <label for="prenom" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Entrez votre prénom :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class="bi bi-file-earmark-person-fill"></i>
                        <input type="prenom" name="prenom" id="prenom" class="text-lg w-full ml-2 focus:outline-none" placeholder="Exemple : Ptit" required="">
                    </div>

                </div>
                
                <div>
                    <label for="email" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Entrez votre adresse mail :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class="bi bi-envelope-fill"></i>
                        <input type="email" name="email" id="email" class="text-lg w-full ml-2 focus:outline-none" placeholder="Exemple : votreemail@ptitcuisto.fr" required="">
                    </div>

                </div>

                <div>
                    <label for="password" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Définissez votre mot de passe :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class="bi bi-backspace-reverse-fill"></i>
                        <input type="password" name="password" id="password" class="text-lg w-full ml-2 focus:outline-none" placeholder="votre_mdp_1234" required="">
                    </div>

                </div>

                <div>
                    <label for="confirm-password" class="text-charte_bleu_fonce block font-permanent_marker text-xl font-medium">Confirmez votre mot de passe :</label>
                    
                    <div class="text-charte_bleu_clair py-1.5 flex items-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce">
                        <i class="bi bi-check-circle-fill"></i>
                        <input type="password" name="confirm-password" id="confirm-password" class="text-lg w-full ml-2 focus:outline-none" placeholder="votre_mdp_1234" required="">
                    </div>

                </div>

                <button class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-2 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce">
                    <i class="bi bi-box-arrow-right"></i>
                    <p type="submit" class="ml-2">S'inscrire</p>
                </button>
                
                <div class="flex -mt-5 justify-center">

                    <div class="flex items-start">
                        <a href="index.php?action=connexion_compte" title="Se connecter" class="text-charte_bleu_fonce text-sm font-medium hover:underline text-right">J'ai déjà un compte.</a>
                    </div>

                </div>
                
            </form>
        </div>
    </div>
</div>


<?php $content = ob_get_clean();
require_once('template.php'); ?>