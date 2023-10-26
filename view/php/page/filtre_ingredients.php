<?php ob_start();
    // Appel des fichiers où sont rédigées ou managées les requêtes SQL
    require_once '../../../controller/page/manager_filtre_ingredients.php';

    require_once '../../../model/page/requetes_filtre_ingredients.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->
<script src="../../js/page/script_ingredients.js"></script>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Liste des recettes filtrée par ingrédient(s)</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant la liste des recettes publiées ayant pour ingrédient(s) :</p>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>