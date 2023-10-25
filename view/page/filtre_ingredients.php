<?php ob_start();
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    require_once '../../model/page/requetes_filtre_ingredients.php';
?>

<script src="../../controller/page/script_filtre_ingredients.js"></script>

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Liste des recettes filtrée par ingrédient(s)</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant la liste des recettes publiées ayant pour ingrédient(s) :</p>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>