<?php ob_start();
    // Appel des fichiers où sont rédigées ou managées les requêtes SQL

    require_once '../../../model/page/requetes_recette.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->
<script src="../../js/page/script_recette.js"></script>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Liste des recettes</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant la liste des recettes publiées.</p><br>

<div id="recettes">
    <?php
        require_once '../../../controller/page/manager_recette.php';
    ?>
</div>

<hr class='border-2 border-black'><br>


<div class="mx-auto text-center">
    <button id="btn" class="text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2">
        Plus
    </button>
</div>

<?php $content = ob_get_clean();
require_once('../template.php');
?>