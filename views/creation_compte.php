<?php ob_start();?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<div class="pt-10">

    <div class="flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">

            <div class="border-2 border-charte_bleu_fonce rounded-lg p-2 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-charte_bleu_fonce font-permanent_marker text-xl font-bold text-center leading-tight md:text-2xl">Créer un compte</h1>
                
                <form class="space-y-4 md:space-y-6" action="#">

                    <div>
                        <label for="nom" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Entrez votre nom :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-person-fill"></i>
                            <input type="nom" name="nom" id="nom" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="Cuisto" required="">
                        </div>

                    </div>

                    <div>
                        <label for="prenom" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Entrez votre prénom :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-file-earmark-person-fill"></i>
                            <input type="prenom" name="prenom" id="prenom" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="Ptit" required="">
                        </div>

                    </div>
                    
                    <div>
                        <label for="email" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Entrez votre adresse mail :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" name="email" id="email" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votreemail@ptitcuisto.fr" required="">
                        </div>

                    </div>

                    <div>
                        <label for="password" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Définissez votre mot de passe :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-backspace-reverse-fill"></i>
                            <input type="password" name="password" id="password" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votre_mdp_1234" required="">
                        </div>

                    </div>

                    <div>
                        <label for="confirm-password" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Confirmez votre mot de passe :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-check-circle-fill"></i>
                            <input type="password" name="confirm-password" id="confirm-password" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votre_mdp_1234" required="">
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div class="flex items-start cursor-pointer hover:underline">

                            <div class="flex items-center h-5">
                                <input id="terms" aria-describedby="terms" type="checkbox" class="cursor-pointer w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                            </div>

                            <div class="ml-2 text-sm">
                                <label for="terms" class="text-charte_gris cursor-pointer" required="">
                                    J'ai lu et j'accepte <span class="text-charte_bleu_fonce font-semibold">les conditions d'utilisation</span>
                                </label>
                            </div>

                        </div>

                    </div>

                    <div class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce">
                        <i class="bi bi-box-arrow-right"></i>
                        <p class="text-[15px] ml-2">S'inscrire</p>
                    </div>


                    <div class="flex justify-center">

                        <div class="flex items-start">
                            <a href="index.php?action=connexion_compte" title="Se connecter" class="text-charte_bleu_fonce text-sm font-medium hover:underline text-right">J'ai déjà un compte.</a>
                        </div>

                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('template.php'); ?>