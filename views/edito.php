<?php ob_start();?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">
    Site du P'tit Cuisto !
</h1>


<!-- Structure de type flex pour placer deux divs côte à côte -->
<div class="flex">
    <!-- Première div prenant la moitié de la largeur -->
    <div id="recettes" class="w-1/2 border-2 border-charte_gris overflow-y-auto rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
    </div>

    <!-- Deuxième div prenant également la moitié de la largeur -->
    <div class="w-1/2 border-2 border-charte_gris bg-charte_bleu_fonce rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        <img class="mx-auto object-scale-down h-72 w-144 my-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">
        <h2 class="font-permanent_marker text-3xl text-center text-charte_blanc">Édito</h2>
        <br>
        <p class="text-xl text-center text-charte_blanc">Bienvenue sur notre site répertoriant toutes les recettes de cuisine publiées par les utilisateurs !</p>
    </div>
</div>

<script>
    let divRecettes = document.querySelector('#recettes');
    let nbRecetteAfficher = 3;
    function afficherTroisRecettes() {
        let recettes = <?php echo json_encode($recettes) ?>;
        let content = '';

        for(let i = 0; i < nbRecetteAfficher; i++) {
            content = "<a href='index.php?action=details_recette&id=" + recettes[i].rec_id + "'>" + "<img src='" + recettes[i].rec_image + "' alt='Image de la recette : " + recettes[i].rec_titre + "' width='500px'/></a>" + "<br>" +
                    "<a href='index.php?action=details_recette&id=" + recettes[i].rec_id + "'>" + (recettes[i].rec_titre).toUpperCase() + "</a><br>" +
                    "Categorie : " + recettes[i].cat_intitule + "<br>" +
                    "Resumé : " + recettes[i].rec_resume + "<br>" + 
                    "Tags : " + recettes[i].tags_intitule;
            divRecettes.innerHTML += content;
        }
    }
    afficherTroisRecettes();
</script>


<?php $content = ob_get_clean();
require_once('template.php'); ?>