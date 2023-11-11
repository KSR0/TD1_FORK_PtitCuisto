<?php ob_start();?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">
    Site du P'tit Cuisto !
</h1>


<!-- Structure de type flex pour placer deux divs côte à côte -->
<div class="flex">
    <!-- Première div prenant la moitié de la largeur -->
    <div class="w-1/2 border-2 border-charte_bleu_fonce rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        <!-- Contenu de la première div -->
        <img class="mx-auto object-scale-down h-72 w-144 mt-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">
        <p class="text-3xl text-center text-charte_bleu_clair">Édito</p>
    </div>

    <!-- Deuxième div prenant également la moitié de la largeur -->
    <div class="w-1/2 border-2 border-charte_bleu_fonce bg-green rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        <img class="mx-auto object-scale-down h-72 w-144 my-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">
        <h2 class="text-3xl text-center text-charte_blanc">Édito</h2>
    </div>
</div>

<?php $content = ob_get_clean();?>

<?php require_once('template.php'); ?>
