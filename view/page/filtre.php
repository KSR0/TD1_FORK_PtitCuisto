<?php ob_start();
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    require_once 'model/requetes_filtre.php';
?>

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Filtrer les recettes</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Sélectionnez le filtre à utiliser pour faire une recherche de recette.</p>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('view/template.php'); ?>