<?php ob_start();
    // Appel des fichiers où sont rédigées ou managées les requêtes SQL
    require_once '../../../controller/page/manager_mon_compte.php';

    require_once '../../../model/page/requetes_mon_compte.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->
<script src="../../js/page/script_mon_compte.js"></script>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Mon compte</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page permettant de voir les informations sur mon compte.</p>

<?php
    // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
    //*nom de la fonction*/($bdd); // Changer le nom de la fonction par le nom de la fonction utilisée dans le requête_BDD correspondant 
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>