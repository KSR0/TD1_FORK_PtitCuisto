<?php ob_start();
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    require_once '../../model/page/requetes_filtre.php';
?>

<script src="../../controller/page/script_filtre.js"></script>

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Filtrer les recettes</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant la sélection d'un filtre pour rechercher une recette.</p>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>