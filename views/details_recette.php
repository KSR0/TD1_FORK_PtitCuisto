<?php ob_start();

// ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ //

echo
"<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Recette : " . $recette->rec_titre . "</h1>";
?>
<div id="recette">
    <?php
    echo
        "<div class='border-2 border-charte_bleu_clair h-fit rounded-lg pt-2 px-4 mb-4 mr-2'>" .
            "<div class='flex'>" .

                "<div id='tag_image' class='w-1/2 max-h-div_recette text-center p-2 mr-2'>" .
                    "<img class='border-2 border-charte_bleu_clair rounded-lg h-auto w-full p-2 mr-2' src='" . $recette->rec_image . "' alt='Image recette " . $recette->rec_titre . "' width='500px'/></a>" . "<br><br>" .
                    "<br>" .

                    "<div class='-mt-20 grid grid-cols-2 gap-2'>";

                // Divs pour chaque tag
                $tags = explode('#', $recette->tags_intitule);
                for ($j = 1; $j < count($tags); $j++) {
                    echo
                        "<div class='text-center text-charte_blanc border-2 border-charte_bleu_clair rounded-lg bg-charte_bleu_clair p-2 mb-2'>" .
                            "<p>" . $tags[$j] . "</p>" .
                        "</div>";
                }

                echo
                    "</div>" .
                "</div>" .

                "<div id='div_infos' class='text-charte_bleu_clair w-1/2 py-2 px-4 ml-2'>" .
                    "<p class='text-3xl'><span class='text-4xl font-permanent_marker'>Catégorie : </span><br>" . $recette->cat_intitule . "</p><br>" .
                    "<p class='text-3xl'><span class='text-4xl font-permanent_marker'>Auteur : </span><br>"  . $recette->user_pseudo . "</p><br>" .
                    "<p class='text-3xl'><span class='text-4xl font-permanent_marker'>Recette créée le :</span><br>" . $recette->rec_date_crea . "</p><br>" .
                    "<p class='text-3xl'><span class='text-4xl font-permanent_marker'>Recette modifiée le :</span><br>" . $recette->rec_date_modif . "</p><br>" .
                "</div>".
            "</div>".

            "<hr class='border-2 border-charte_bleu_fonce my-4 mx-auto'>" .

            "<div class='flex'>" .
                "<div id='resume' class='w-1/2 text-charte_bleu_clair py-2 px-4'>" .
                    "<p class='text-2xl'><span class='text-3xl font-permanent_marker'>Résumé :</span><br>" . $recette->rec_resume . "</p><br>" . 
                "</div>" .

                "<div class='w-1/2 border-l-2 border-charte_bleu_fonce mb-2'>" .
                    "<div id='contenu' class='text-charte_bleu_clair pt-2 px-4'>" .
                        "<p class='text-2xl'><span class='text-3xl font-permanent_marker'>Contenu :</span><br>" . $recette->rec_contenu . "</p><br>" . 
                    "</div>" .
                "</div>" .
            "</div>" .
        "</div>";
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

<?php
    if (isset($_SESSION['user_id'])) {
        echo "<hr class='my-2 mt-3'>";
        echo "<p class='text-3xl text-charte_bleu_clair'>Ajouter un commentaire</p>";
        echo '<form action="index.php?action=requete_creation_commentaire&rec_id=' . $recette->rec_id .  '" method="post">
        <div>
           <label for="commentaire">Commentaire</label><br />
           <textarea id="commentaire" name="commentaire" placeholder="..."></textarea>
        </div>
        <div>
           <input type="submit" class="text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2"/>
        </div>
     </form>';
    }
?>

<?php $content = ob_get_clean();
require_once('template.php'); ?>
