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
        "Date de création : " . date("d/m/Y à H:i", strtotime($recette->rec_date_crea)) . "<br><br>" .
        "Dernière modification : " . date("d/m/Y à H:i", strtotime($recette->rec_date_modif)) . "<br><br>" .
        "Tags : " . $recette->tags_intitule . "<br>";
        
        
    ?>
</div>

<hr class="my-2 mt-3">
<p class="text-3xl text-charte_bleu_clair">Liste des commentaires</p>
<div id="commentaires">
    <?php
    foreach ($commentaires as $commentaire) {
    ?>
        <p><strong><?= htmlspecialchars($commentaire->user_pseudo) ?></strong> le <?= date("d/m/Y à H:i", strtotime($commentaire->com_date_crea)) . " a dit : " ?></p>
        <p><?= nl2br(htmlspecialchars($commentaire->com_description)) ?></p>
        <br>
    <?php
    }
    ?>
</div>

<hr class="my-2 mt-3">
<p class="text-3xl text-charte_bleu_clair">Ajouter un commentaire</p>

<form action="index.php?action=requete_creation_commentaire&rec_id=<?= $recette->rec_id ?>" method="post">
   <div>
  	<label for="commentaire">Commentaire</label><br />
  	<textarea id="commentaire" name="commentaire" placeholder="..."></textarea>
   </div>
   <div>
  	<input type="submit" class="text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2"/>
   </div>
</form>

<?php $content = ob_get_clean();
require_once('template.php'); ?>