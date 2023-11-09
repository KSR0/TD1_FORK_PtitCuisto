<?php ob_start();?>


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Détails de la recette</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant les détails de la recette sélectionnée.</p>

<div id="recette">
    <?php
            echo "<img src='" . $recette->rec_image . "' alt='Image recette " . $recette->rec_titre . "' width='500px'/></a>" . "<br><br>" .
        "Titre : " . strtoupper($recette->rec_titre) . "<br><br>" .
        "Auteur : "  . $recette->user_pseudo . "<br><br>" .
        "Catégorie : " . $recette->cat_intitule . "<br><br>" .
        "Résumé : " . $recette->rec_resume . "<br><br>" . 
        "Contenu : " . $recette->rec_contenu . "<br><br>" .
        "Date de création : " . $recette->rec_date_crea . "<br><br>" .
        "Dernière modification : " . $recette->rec_date_modif . "<br><br>" .
        "Tags : " . $recette->tags_intitule . "<br>";
        
        
    ?>
</div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>