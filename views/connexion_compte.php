<?php ob_start();?>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<div class="pt-10 mx-auto">

    <div class="flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">

            <div class="border-2 border-charte_bleu_fonce rounded-lg p-2 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-charte_bleu_fonce font-permanent_marker text-xl font-bold text-center leading-tight md:text-2xl">Se connecter à votre compte</h1>
                
                <form action="index.php?action=requete_connexion_compte" id="loginForm" method="post" class="space-y-4 md:space-y-6">
                    <div>
                        <label for="email" class="text-charte_bleu_clair block text-sm font-medium">Entrez votre adresse mail :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" name="email" id="email" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votreemail@ptitcuisto.fr" required="">
                        </div>

                    </div>

                    <div>
                        <label for="password" class="text-charte_bleu_clair block text-sm font-medium">Entrez votre mot de passe :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-backspace-reverse-fill"></i>
                            <input type="password" name="password" id="password" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votre_mdp_1234" required="">
                        </div>

                    </div>

                    <button class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <p class="ml-2">Se connecter</p>
                    </button>

                    
                    <div class="flex justify-center">

                        <div class="flex items-start">
                            <a href="index.php?action=creation_compte" title="S'inscrire" class="text-charte_bleu_fonce text-sm font-medium hover:underline text-right">Je n'ai pas de compte</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>