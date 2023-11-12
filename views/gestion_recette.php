<?php ob_start(); 
    if (isset($_GET['type_plat'])) {
        $type_plat = $_GET['type_plat'];
    }
    else {
        $type_plat = 'recette';
    }
?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->



<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Liste des <?php echo $type_plat . 's' ?></h1>
<p class="text-3xl text-center text-charte_bleu_clair">Page affichant la liste des <?php echo $type_plat . 's' ?> publiées.</p><br>

<div id="recettes">
        
</div>

<div class="mx-auto text-center">
    <button id="btnPlus" onclick="afficherRecettes()" class="bg-charte_bleu_fonce scroll text-charte_blanc hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2">
        Voir plus de recettes
    </button>
</div>

<script>
    let divRecettes = document.querySelector('#recettes');
    let nbRecetteAfficher = 0;
    let compteur = 0;

    function afficherRecettes() {
        let recettes = <?php echo json_encode($recettes) ?>;
        let content = '';

        for (let i = nbRecetteAfficher; i < nbRecetteAfficher + 10; i++) {
            compteur++;
            if (i < recettes.length && recettes[i].length != 0) {
                content +=
                    "<p class='text-center font-permanent_marker text-charte_bleu_fonce'>Recette n°" + compteur + "/" + (nbRecetteAfficher + 10) + "</p>" +
                    "<div class='border-2 border-charte_bleu_clair rounded-lg py-2 px-4 mb-4 mr-2'>" + 
                        "<div class='flex'>" +
                            "<div id='div_gauche' class='w-1/2 max-h-div_recette overflow-y-auto text-center p-2 mr-2'>" +
                                "<a class='text-center' href='index.php?action=details_recette&rec_id=" + recettes[i].rec_id + "'>" +
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

                            "<div id='div_droite' class='text-charte_bleu_clair max-h-div_recette overflow-y-auto w-1/2 py-2 px-4 ml-2'>" +
                                "<p class='font-permanent_marker text-center text-5xl'><a href='index.php?action=details_recette&rec_id=" + recettes[i].rec_id + "'>" + (recettes[i].rec_titre).toUpperCase() + "</a></p><br>" +
                                "<p class='text-3xl'>Catégorie : " + recettes[i].cat_intitule + "</p><br>" +
                                "<p class='text-2xl'>Résumé : <br>" + recettes[i].rec_resume + "</p><br>" +
                            "</div>" +
                        "</div>" +

                        "<hr class='border-2 border-charte_bleu_fonce my-4 mx-auto'>" +

                        "<div class='text-center'>" +
                            "<div class='flex'>" +
                                "<button class='font-permanent_marker cursor-pointer p-1 flex justify-center rounded-lg px-4 border-2 border-charte_bleu_fonce text-charte_bleu_clair mx-auto bg-charte_blanc hover:text-charte_blanc hover:border-4 hover:bg-charte_bleu_clair'>" +
                                    "<a href='index.php?action=suppression_recette&id=" + recettes[i].rec_id + "'>" +
                                        "<p>Supprimer la recette</p>" +
                                    "</a>" +
                                "</button>" +

                                "<button class='font-permanent_marker cursor-pointer p-1 flex justify-center rounded-lg px-4 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:border-4 hover:bg-charte_bleu_fonce'>" +
                                    "<a href='index.php?action=modification_recette&id=" + recettes[i].rec_id + "'>" +
                                        "<p>Modifier la recette</p>" +
                                    "</a>" +
                                "</button>" +
                            "</div>" +
                        "</div>" +
                    "</div>";
            } else {
                document.getElementById('btnPlus').style.display = 'none';
            }
        }

        divRecettes.innerHTML += content;
        nbRecetteAfficher += 10;
    }

    afficherRecettes();
</script>

<?php $content = ob_get_clean();
require_once('template.php');
?>
