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

                "<div id='tag_image' class='w-1/2 max-h-div_recette overflow-y-auto overflow-x-hidden text-center p-2 mr-2'>" .
                    "<img class='border-2 border-charte_bleu_clair rounded-lg h-auto w-full p-2 mr-2' src='" . $recette->rec_image . "' alt='Image recette " . $recette->rec_titre . "' width='500px'/>" . "<br><br>" .
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

                "<div id='div_infos' class='text-charte_bleu_clair border-l-2 border-charte_bleu_fonce w-1/2 py-2 px-4'>" .
                    "<p class='text-3xl'>
                        <span class='text-4xl text-charte_bleu_fonce font-permanent_marker'>Catégorie : </span>
                    <br>" . $recette->cat_intitule . "</p><br>" .

                    "<p class='text-3xl'>
                        <span class='text-4xl text-charte_bleu_fonce font-permanent_marker'>Auteur : </span>
                    <br>"  . $recette->user_pseudo . "</p><br>" .

                    "<p class='text-3xl'>
                        <span class='text-4xl text-charte_bleu_fonce font-permanent_marker'>Recette créée le :</span>
                    <br>" . $recette->rec_date_crea . "</p><br>" .
                    
                    "<p class='text-3xl'>
                        <span class='text-4xl text-charte_bleu_fonce font-permanent_marker'>Recette modifiée le :</span>
                    <br>" . $recette->rec_date_modif . "</p><br>" .
                "</div>".
            "</div>".

            "<hr class='border-2 border-charte_bleu_fonce my-4 mx-auto'>" .

            "<div class='flex'>" .
                "<div id='resume' class='w-1/2 text-charte_bleu_clair py-2 px-4'>" .
                    "<p class='text-2xl'><span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Résumé :</span><br>" . $recette->rec_resume . "</p><br>" . 
                "</div>" .

                "<div class='w-1/2 border-l-2 border-charte_bleu_fonce mb-2'>" .
                    "<div id='contenu' class='text-charte_bleu_clair pt-2 px-4'>" .
                        "<p class='text-2xl'><span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Contenu :</span><br>" . $recette->rec_contenu . "</p><br>" . 
                    "</div>" .
                "</div>" .
            "</div>" .
        "</div>";
    ?>
</div>

<h2 class="text-4xl text-charte_bleu_fonce font-permanent_marker mb-2">Commentaires</h2>
<div class="border-2 border-charte_bleu_fonce text-charte_bleu_clair rounded-lg p-2 mb-2" id="commentaires">
    <?php
    foreach ($commentaires as $commentaire) {
    ?>
        <p class="text-3xl p-2 rounded-lg bg-charte_bleu_clair text-charte_blanc mb-1"><span class="font-permanent_marker"><?= htmlspecialchars($commentaire->user_pseudo) ?></span> a commenté le <?= date("d/m/Y à H:i", strtotime($commentaire->com_date_crea)) . " :" ?></p>
        <p class="text-2xl"><?= nl2br(htmlspecialchars($commentaire->com_description)) ?></p>
        <hr class='border border-charte_bleu_fonce my-4 mx-auto'>
    <?php
    }
    ?>
</div>

<?php
    if (isset($_SESSION['user_id'])) {
        echo "<hr class='border-2 border-charte_bleu_clair my-6 mx-auto'>" .
        "<h2 class='text-4xl text-charte_bleu_fonce font-permanent_marker mb-2'>Ajouter un commentaire</h2>" .
        "<div class='border-2 border-charte_bleu_fonce text-charte_bleu_clair rounded-lg p-2' id='ajout_commentaires'>" .
            "<form action='index.php?action=requete_creation_commentaire&rec_id=' . $recette->rec_id .  '' method='post'>" .
                "<div id='contenu' class='text-charte_bleu_clair pt-2 -mb-2'>" .
                    "<label class='font-permanent_marker text-3xl p-2 rounded-lg bg-charte_bleu_clair text-charte_blanc' for='ajout_comm'>Écrivez un commentaire : </label><br>" .
                    "<div class='mb-2 mt-4'>" .
                        "<textarea class='text-charte_bleu_gris border border-charte_bleu_fonce rounded-lg p-2 w-full' id='ajout_comm' name='ajout_comm' placeholder='Exemple : Pour avoir essayer de faire votre recette, elle est excellente !'></textarea>" .
                    "</div>" .
                "</div>" .

                "<button class='font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce'>" .
                    "<p type='submit'>Publier</p>" .
                "</button>" .
            "</form>" .
        "</div>";
    }
?>

<?php $content = ob_get_clean();
require_once('template.php'); ?>