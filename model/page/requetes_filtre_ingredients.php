<?php
    require_once '../../../includes/connexionBDD.php';

    function recupRecettesIngredients($bdd) {
        if(isset($_POST['selection_ingredient'])) {
            $requete = "SELECT REC_IMAGE, REC_TITRE, CAT_INTITULE, REC_RESUME FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) WHERE REC_CONTENU LIKE '%".$_POST['selection_ingredient']."%'" ; /*mettre la requête SQL entre les ""*/
            $reqServeur = $bdd->prepare($requete);
            $reqServeur->execute();
            $nom_variable = $reqServeur->fetchAll(); /*changer le nom_variable en fonction de ce que tu veux afficher*/

            foreach($nom_variable as $nom_table_sql) { /*changer les variables nom_table_sql en fonction de la table sql utilisée*/
                $nomPlat = $nom_table_sql["REC_TITRE"];
                $requeteTags = "SELECT TAG_INTITULE FROM FORK_TAGS WHERE TAG_RECETTE = '$nomPlat'";
                $reqServeurTags = $bdd->prepare($requeteTags);
                $reqServeurTags->execute();
                $nom_variableTags = $reqServeurTags->fetchAll();
                echo "<br><a href='" . $nom_table_sql["REC_IMAGE"] . "'>" . "<img src='" . $nom_table_sql["REC_IMAGE"] . "' alt='Image recette " . $nom_table_sql['REC_TITRE'] . "' width='500px'/></a>" . "<br>" .
                strtoupper($nom_table_sql["REC_TITRE"]) . "<br>" .
                "Resumé : " . $nom_table_sql["REC_RESUME"] . "<br>" . 
                "Tags : ";
                foreach($nom_variableTags as $nom_table_sql_tags) {
                    echo '#' . $nom_table_sql_tags["TAG_INTITULE"] . ' ';
                }
                echo "<hr class='border-2 border-black'><br>";
            }
        }
    }
    
?>