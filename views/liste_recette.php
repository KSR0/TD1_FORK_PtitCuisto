<?php ob_start(); 
    if (isset($_GET['type_plat'])) {
        $type_plat = $_GET['type_plat'];
    }
    else {
        $type_plat = 'recette';
    }
?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->



<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Liste des <?php echo $type_plat . 's' ?> disponibles</h1>

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
                    "<div class='border-2 border-charte_bleu_clair rounded-lg max-h-div_recette flex py-2 px-4 mb-4 mr-2'>" + 
                        "<div id='div_gauche' class='w-1/2 max-h-div_recette overflow-y-auto text-center p-2 mr-2'>" +
                            "<a class='text-center' href='index.php?action=details_recette&rec_id=" + recettes[i].rec_id + "'>" +
                                "<img class='h-auto w-full' src='" + recettes[i].rec_image + "' alt='Image recette " + recettes[i].rec_titre + "'>" +
                            "</a><br>";

                // Div pour les tags
                content += "<div class='-mt-2 grid grid-cols-2 gap-2'>";

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

                        "<div id='div_droite' class='border-l-2 border-charte_bleu_fonce text-charte_bleu_clair max-h-div_recette overflow-y-auto w-1/2 py-2 px-4 ml-2'>" +
                            "<p class='font-permanent_marker text-charte_bleu_fonce text-center text-5xl'><a href='index.php?action=details_recette&rec_id=" + recettes[i].rec_id + "'>" + (recettes[i].rec_titre).toUpperCase() + "</a></p><br>" +
                            "<p class='text-2xl'><span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Catégorie : </span>" + recettes[i].cat_intitule + "</p><br>" +
                            "<p class='text-2xl'><span class='text-3xl text-charte_bleu_fonce font-permanent_marker'>Résumé :  </span><br>" + recettes[i].rec_resume + "</p><br>" +
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
