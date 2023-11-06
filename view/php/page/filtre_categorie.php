<?php ob_start();
    // Appel des fichiers où sont rédigées ou managées les requêtes SQL
    require_once '../../../controller/page/manager_filtre_categorie.php';
    require_once '../base/modale_categorie.php';

    require_once '../../../model/page/requetes_filtre_categorie.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->
<script src="../../js/page/script_filtre_categorie.js"> </script>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->
<?php
    if(isset($_POST['list-radio'])) {
        $tab = ["Entrée", "Plat", "Dessert"];
        echo "<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'> Liste des recettes filtrée par catégorie </h1>
        <p class='text-3xl text-center text-charte_bleu_clair'> Page affichant la liste des recettes publiées ayant pour catégorie : " . $tab[$_POST['list-radio'] - 1] . "</p>";
    }
    else {
        echo "<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'> Liste des recettes filtrée par catégorie </h1>
        <p class='text-3xl text-center text-charte_bleu_clair'> Aucune correspondance </p>";
    }


    recupRecettesCategorie($bdd);
?>

<?php $content = ob_get_clean();
require_once('../template.php'); ?>