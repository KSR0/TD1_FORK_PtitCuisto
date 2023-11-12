<?php ob_start();?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">
    Site du P'tit Cuisto !
</h1>


<!-- Structure de type flex pour placer deux divs côte à côte -->
<div class="flex">
    <!-- Première div prenant la moitié de la largeur -->
    <div id="recettes" class="w-1/2 overflow-y-auto border-2  border-charte_gris rounded-lg max-h-div_recette py-2 px-4 mb-4 mr-2">
        
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
        content+=
            "<p class='text-center font-permanent_marker text-charte_bleu_fonce text-3xl py-2'>Les dernières recettes</p>";

        for (let i = 0; i < 3; i++) {
            compteur++;
            content +=
                "<a href='index.php?action=details_recette&id=" + recettes[i].rec_id + "'>" +
                    "<div class='border-2 border-charte_bleu_clair h-fit rounded-lg max-h-div_recette flex pt-2 px-4 mb-4 mr-2'>" + 
                        "<div id='div_gauche' class='w-1/2 text-center p-2 mr-2'>" +
                            "<img class='border-2 border-charte_bleu_clair rounded-lg h-auto w-full p-2 mr-2' src='" + recettes[i].rec_image + "' alt='Image recette " + recettes[i].rec_titre + "'>" +
                        "<br>";
                         
                content += "<div class='-mt-5 mb-2'>";

                        let tags = recettes[i].tags_intitule.split('#');
                        if (tags.length < 3) {
                            for (let j = 1; j < tags.length; j++) {
                                content +=
                                    "<div class='text-center text-charte_blanc border-2 border-charte_bleu_clair rounded-lg bg-charte_bleu_clair p-2 mt-2'>" +
                                        "<p class='text-xl'>" + tags[j] + "</p>" +
                                    "</div>";
                            }
                        }
                        else {
                            for (let j = 1; j < 3; j++) {
                                content +=
                                    "<div class='text-center text-charte_blanc border-2 border-charte_bleu_clair rounded-lg bg-charte_bleu_clair p-2 mt-2'>" +
                                        "<p class='text-xl'>" + tags[j] + "</p>" +
                                    "</div>";
                            }
                        }

                    content += 
                            "</div>";

                content +=
                        "</div>" +

                        "<div class='text-charte_bleu_clair w-1/2 pt-2 px-4 -mb-5 ml-2'>" +
                            "<p class='font-permanent_marker text-center text-2xl'>" + (recettes[i].rec_titre).toUpperCase() + "</p><br>" +
                            "<p class='text-xl'>Catégorie : " + recettes[i].cat_intitule + "</p><br>" +
                            "<p class='text-xl'>Auteur : " + recettes[i].user_pseudo + "</p><br>" +
                            "<p class='text-xl'>Dernière modification le <br>" + recettes[i].rec_date_modif + "</p><br>" +
                        "</div>" +

                    "</div>" +
                "</a>";
        }
        divRecettes.innerHTML += content;
    }
    afficherTroisRecettes();
    
</script>

<?php $content = ob_get_clean();?>

<?php require_once('template.php'); ?>
