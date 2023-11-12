<?php ob_start();?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">
    Site du P'tit Cuisto !
</h1>


<!-- Structure de type flex pour placer deux divs côte à côte -->
<div class="flex">
    <!-- Première div prenant la moitié de la largeur -->
    <div id="recettes" class="w-1/2 border-2 overflow-y-auto border-charte_gris rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        
    </div>

    <!-- Deuxième div prenant également la moitié de la largeur -->
    <div class="w-1/2 border-2 border-charte_gris bg-charte_bleu_fonce rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        <img class="mx-auto object-scale-down h-72 w-144 my-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">
        <h2 class="font-permanent_marker text-3xl text-center text-charte_blanc">Édito</h2>
        <br>
        <p class="text-xl text-center text-charte_blanc">Bienvenue sur notre site répertoriant toutes les recettes de cuisine publiées par les utilisateurs !</p>
    </div>
</div>

<script>
    let divRecettes = document.querySelector('#recettes');
    let compteur = 0;

    function afficherTroisRecettes() {
        let recettes = <?php echo json_encode($recettes) ?>;
        let content = '';

        for (let i = 0; i < 3; i++) {
            compteur++;
            content +=
                "<p class='text-center font-permanent_marker text-charte_bleu_fonce'>Recette n°" + compteur + "/" + 3 + "</p>" +
                "<div class='border-2 border-charte_bleu_clair rounded-lg max-h-div_recette flex py-2 px-4 mb-4 mr-2'>" + 
                    "<div id='div_gauche' class='w-1/2 max-h-div_recette overflow-y-auto text-center p-2 mr-2'>" +
                        "<a class='text-center' href='index.php?action=details_recette&id=" + recettes[i].rec_id + "'>" +
                            "<img class='border-2 border-charte_bleu_clair rounded-lg h-auto w-full p-2 mr-2' src='" + recettes[i].rec_image + "' alt='Image recette " + recettes[i].rec_titre + "'>" +
                        "</a><br>";

            // Div pour les tags
            content += "<div class='grid grid-cols-2 gap-2'>"; // Utilisation des classes 'grid' et 'grid-cols-2'

            // Divs pour chaque tag
            let tags = recettes[i].tags_intitule.split('#');
            for (let j = 1; j < tags.length; j++) {
                content +=
                    "<div class='text-center text-charte_blanc border-2 border-charte_bleu_clair rounded-lg bg-charte_bleu_clair p-2 mb-2'>" +
                        "<p>" + tags[j] + "</p>" +
                    "</div>";
            }

            content += 
                    "</div>";

            content +=
                    "</div>" +

                    "<div class='text-charte_bleu_clair max-h-div_recette overflow-y-auto w-1/2 py-2 px-4 ml-2'>" +
                        "<p class='font-permanent_marker text-center text-5xl'><a href='index.php?action=details_recette&id=" + recettes[i].rec_id + "'>" + (recettes[i].rec_titre).toUpperCase() + "</a></p><br>" +
                        "<p class='text-3xl'>Catégorie : " + recettes[i].cat_intitule + "</p><br>" +
                        "<p>Résumé : <br>" + recettes[i].rec_resume + "</p><br>" +
                    "</div>" +

                "</div>";
        }
        divRecettes.innerHTML += content;
    }
    afficherTroisRecettes();
    
</script>


<?php $content = ob_get_clean();?>

<?php require_once('template.php'); ?>
