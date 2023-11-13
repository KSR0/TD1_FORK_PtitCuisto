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
                    "<img class='h-auto w-full' src='" . $recette->rec_image . "' alt='Image recette " . $recette->rec_titre . "' width='500px'/>" . "<br><br>" .
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
                    "<p class='text-2xl'>
                        <span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Catégorie : </span>
                    <br>" . $recette->cat_intitule . "</p><br>" .

                    "<p class='text-2xl'>
                        <span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Auteur : </span>
                    <br>"  . $recette->user_pseudo . "</p><br>" .

                    "<p class='text-2xl'>
                        <span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Recette créée :</span>
                    <br>le " . date("d/m/Y à H:i", strtotime($recette->rec_date_crea)) . "</p><br>" .
                    
                    "<p class='text-2xl'>
                        <span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Dernière modification le :</span>
                        <br>le " . date("d/m/Y à H:i", strtotime($recette->rec_date_modif)) . "</p><br>" .
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

<?php
if (count($commentaires) != 0) {
    echo '<h2 class="text-4xl text-charte_bleu_fonce font-permanent_marker mb-2">Commentaires</h2>
    <div class="border-2 border-charte_bleu_fonce text-charte_bleu_clair rounded-lg p-2 mb-2" id="commentaires">';
    
    foreach ($commentaires as $commentaire) {
        echo '
            <p class="text-3xl p-2 rounded-lg bg-charte_bleu_clair text-charte_blanc mb-1"><span class="font-permanent_marker text-charte_bleu_fonce">' . htmlspecialchars($commentaire->user_pseudo) . '</span> a commenté le ' . date("d/m/Y à H:i", strtotime($commentaire->com_date_crea)) . ' :</p>
            <p class="text-xl">' . nl2br(htmlspecialchars($commentaire->com_description)) . '</p>
            <hr class="border border-charte_bleu_fonce my-4 mx-auto">';
    }
    
    echo '</div>';
}
?>



<?php
    if (isset($_SESSION['user_id'])) {
        echo "<hr class='border-2 border-charte_bleu_clair my-6 mx-auto'>" .
        "<h2 class='text-4xl text-charte_bleu_fonce font-permanent_marker mb-2'>Ajouter un commentaire</h2>" .
        "<div class='border-2 border-charte_bleu_fonce text-charte_bleu_clair rounded-lg p-2' id='ajout_commentaires'>" .
            "<form action='index.php?action=requete_creation_commentaire&rec_id=" . $recette->rec_id .  "' method='post'>" .
                "<div id='contenu' class='text-charte_bleu_clair pt-2 -mb-2'>" .
                    "<label class='font-permanent_marker text-2xl p-2 rounded-lg bg-charte_bleu_clair text-charte_blanc' for='commentaire'>Écrivez un commentaire : </label><br>" .
                    "<div class='mb-2 mt-4'>" .
                        "<textarea class='text-charte_bleu_gris text-xl border border-charte_bleu_fonce rounded-lg p-2 w-full' id='ajout_comm' name='commentaire' placeholder='Exemple : Pour avoir essayer de faire votre recette, elle est excellente !'></textarea>" .
                    "</div>" .
                "</div>" .

                "<div id='error' class='text-center'></div>" .

                "<button id='submit_btn' class='font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce hover:border-4 hover:border-charte_bleu_clair'>" .
                    "<p type='submit'>Publier</p>" .
                "</button>" .
            "</form>" .
        "</div>";
    }
?>

<script>
    let commentaire = document.querySelector('#ajout_comm');
    let message_erreur = document.querySelector('#error');
    let submit_btn = document.querySelector('#submit_btn');
    let comment_form = document.querySelector('#comment_form');

    submit_btn.addEventListener("click", function () {
        let commentaire_value = commentaire.value;

        if (commentaire_value === '') {
            message_erreur.innerHTML = "<p class='text-charte_bleu_fonce'><span class='font-permanent_marker'>Erreur :</span> le commentaire ne peut pas être vide.</p>";
            // Annuler l'envoi du formulaire
            event.preventDefault();
        } else {
            message_erreur.innerHTML = ''; 
            // Soumettre le formulaire
            comment_form.submit();
        }
    });
</script>

<?php $content = ob_get_clean();
require_once('template.php'); ?>