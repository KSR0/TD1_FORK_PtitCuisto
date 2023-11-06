<?php
    require_once '../../../includes/connexionBDD.php';

    function recupererLaRecette($bdd, $idPlat) {
        $requeteRecette = "
            SELECT REC_IMAGE, REC_TITRE, CAT_INTITULE, REC_RESUME, TAG_INTITULE FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_TAGS USING(TAG_ID) 
            WHERE REC_ID = $idPlat;
        ";
        $reqServeurRecette = $bdd->prepare($requeteRecette);
        $reqServeurRecette->execute();
        $nom_variableRecette = $reqServeurRecette->fetchAll();

        foreach($nom_variableRecette as $nom_table_sql_recette) {
            $nomPlat = $nom_table_sql_recette["REC_TITRE"];
            $requeteTags = "SELECT TAG_INTITULE FROM FORK_TAGS WHERE TAG_RECETTE = '$nomPlat'";
            $reqServeurTags = $bdd->prepare($requeteTags);
            $reqServeurTags->execute();
            $nom_variableTags = $reqServeurTags->fetchAll();
            echo 
            "<img src='" . $nom_table_sql_recette["REC_IMAGE"] . "' alt='Image recette " . $nom_table_sql_recette["REC_TITRE"] . "' width='500px'/>" . "<br>" .
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