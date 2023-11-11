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
                <h1 class="text-charte_bleu_fonce font-permanent_marker text-xl font-bold text-center leading-tight md:text-2xl">Panneau Administrateur</h1>
                

                <div class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce">
                        <i class="bi bi-egg-fried"></i>
                        <button class="text-[15px] ml-2">Gerer Recettes</button>
                </div>

                <div class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce">
                        <i class="bi bi-people"></i>
                        <button class="text-[15px] ml-2">Gerer Utilisateurs</button>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>