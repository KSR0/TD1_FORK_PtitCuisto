<?php ob_start();?>
<script>
    let email;
    let password;
</script>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<div class="pt-10 mx-auto">

    <div class="flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0">

        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">

            <div class="border-2 border-charte_bleu_fonce rounded-lg p-2 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-charte_bleu_fonce font-permanent_marker text-xl font-bold text-center leading-tight md:text-2xl">Se connecter à votre compte</h1>
                
                <form id="loginForm" method="post" class="space-y-4 md:space-y-6" action="#">
                    
                    <div>
                        <label for="email" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Entrez votre adresse mail :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-envelope-fill"></i>
                            <input type="email" name="email" id="email" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votreemail@ptitcuisto.fr">
                        </div>

                    </div>

                    <div>
                        <label for="password" class="text-charte_bleu_clair block mb-2 text-sm font-medium">Entrez votre mot de passe :</label>
                        
                        <div class="text-charte_blanc py-1.5 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                            <i class="bi bi-backspace-reverse-fill"></i>
                            <input type="password" name="password" id="password" class="text-[15px] ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="votre_mdp_1234">
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div class="flex items-start cursor-pointer hover:underline">

                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="cursor-pointer w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300">
                            </div>

                            <div class="ml-2 text-sm">
                                <label for="remember" class="text-charte_gris cursor-pointer">Se souvenir de moi</label>
                            </div>

                        </div>
                        <a href="#" class="text-charte_bleu_fonce text-sm font-medium hover:underline">Mot de passe oublié ?</a>

                    </div>

                    <button type="submit" class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <p class="text-[15px] ml-2">Se connecter</p>
                    </button>
                    
                    <script>
                        document.getElementById("loginForm").addEventListener("submit", function (event) {
                            event.preventDefault();

                            let email = document.getElementById("email").value;
                            let password = document.getElementById("password").value;

                            $.post("views/traitement_login.php", { email: email, password: password }, function (data) {
                                let donnes = JSON.parse(data);

                                if(donnes.error) {
                                    alert(donnes.error);
                                    return;
                                }

                                else {
                                    $.post("views/variables_session.php", { 
                                        user_id: donnes.USER_ID, 
                                        user_pseudo: donnes.USER_PSEUDO, 
                                        typ_id: donnes.TYP_ID }, 
                                        function (response) {
                                            console.log(response);
                                            if(response) {
                                                //window.location.href = "index.php?action=edito";
                                            }
                                            else {
                                                alert("Erreur lors de la connexion");
                                            }
                                        });
                                        
                                    }
                            });
                        });    
                    </script>

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

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('template.php'); ?>