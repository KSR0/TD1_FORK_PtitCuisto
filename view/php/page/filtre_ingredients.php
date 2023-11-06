<?php ob_start();
    // Appel des fichiers où sont rédigées ou managées les requêtes SQL
    require_once '../../../controller/page/manager_filtre_ingredients.php';

    require_once '../../../model/page/requetes_filtre_ingredients.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<?php
    echo "<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Liste des recettes filtrée par ingrédient(s)</h1>
    <p class='text-3xl text-center text-charte_bleu_clair'>Page affichant la liste des recettes publiées ayant pour ingrédient(s) : " . $_POST['selection_ingredient'] . "</p>";

    recupRecettesIngredients($bdd);
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>