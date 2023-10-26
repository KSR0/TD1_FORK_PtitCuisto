<?php
    require_once '../../../includes/connexionBDD.php';

    function recupererToutesLesRecettes($bdd) {
        //$limit_min = 0;
        //$limit_max = $limit_min + 10;
        $requeteRecette = "SELECT REC_IMAGE, REC_TITRE, CAT_INTITULE, REC_RESUME, TAG_INTITULE FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_TAGS USING(TAG_ID) ORDER BY rec_date_crea DESC LIMIT 0, 10" ;
        $reqServeurRecette = $bdd->prepare($requeteRecette);
        $reqServeurRecette->execute();
        $nom_variableRecette = $reqServeurRecette->fetchAll(); /*changer le nom_variable en fonction de ce que tu veux afficher*/

        foreach($nom_variableRecette as $nom_table_sql_recette) { /*changer les variables nom_table_sql en fonction de la table sql utilisée*/
            $nomPlat = $nom_table_sql_recette["REC_TITRE"];
            $requeteTags = "SELECT TAG_INTITULE FROM FORK_TAGS WHERE TAG_RECETTE = '$nomPlat'";
            $reqServeurTags = $bdd->prepare($requeteTags);
            $reqServeurTags->execute();
            $nom_variableTags = $reqServeurTags->fetchAll();
            echo 
            "<a href='" . $nom_table_sql_recette["REC_IMAGE"] . "'>" . "<img src='" . $nom_table_sql_recette["REC_IMAGE"] . "' alt='Image recette " . $nom_table_sql_recette["REC_TITRE"] . "' width='500px'/></a>" . "<br>" .
            strtoupper($nom_table_sql_recette["REC_TITRE"]) . "<br>" .
            "Categorie : " . $nom_table_sql_recette["CAT_INTITULE"] . "<br>" .
            "Resumé : " . $nom_table_sql_recette["REC_RESUME"] . "<br>" . 
            "Tags : ";
            foreach($nom_variableTags as $nom_table_sql_tags) {
                echo '#' . $nom_table_sql_tags["TAG_INTITULE"] . ' ';
            }
        }
    }
?>
