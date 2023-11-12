<script>
document.addEventListener("DOMContentLoaded", function() {
    let divRecettes = document.querySelector('#recettes');
    let nbRecetteAfficher = 0;
    function afficherRecettes() {
        let recettes = <?php echo json_encode($recettes) ?>;
        console.log(recettes);
        let content = '';
        for(let i = nbRecetteAfficher; i < nbRecetteAfficher + 10; i++) {
            if(i < recettes.length) {
                content += 
                <?php
                    echo "<a href='index.php?action=details_recette&id=" . $recettes[$i]->rec_id . "'>" . "<img src='" . $recettes[$i]->rec_image . "' alt='Image recette " . $recettes[$i]->rec_titre . "' width='500px'/></a>" . "<br>" .
                    "<a href='index.php?action=details_recette&id=" . $recettes[$i]->rec_id . "'>" . strtoupper($recettes[$i]->rec_titre) . "</a><br>" .
                    "Categorie : " . $recettes[$i]->cat_intitule . "<br>" .
                    "Resumé : " . $recettes[$i]->rec_resume . "<br>" . 
                    "Tags : " . $recettes[$i]->tags_intitule;
                ?>
            }
            else {
                document.getElementById('btnPlus').style.display = 'none';
            }
        }
        divRecettes.innerHTML += content;
        nbRecetteAfficher += 10;
        console.log(nbRecetteAfficher);
    }
})
</script>