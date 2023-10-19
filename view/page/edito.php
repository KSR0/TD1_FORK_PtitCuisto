<?php ob_start();
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    //require_once 'model/requetes_edito.php';
?>

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Site du P'tit Cuisto !</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page Édito (acceuil du site)</p>
<img class="mx-auto object-scale-down h-72 w-144 mt-5" src="../../img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>