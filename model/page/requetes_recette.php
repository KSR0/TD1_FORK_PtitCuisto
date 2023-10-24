<?php
    require_once '../../includes/connexionBDD.php';

    function recupererToutesLesRecettes($bdd) {
        $requete = "SELECT REC_IMAGE, REC_TITRE, CAT_INTITULE, REC_RESUME, TAG_INTITULE FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_TAGS USING(TAG_ID) ORDER BY rec_date_crea DESC LIMIT 11" ; /*mettre la requête SQL entre les ""*/
        $reqServeur = $bdd->prepare($requete);
        $reqServeur->execute();
        $nom_variable = $reqServeur->fetchAll(); /*changer le nom_variable en fonction de ce que tu veux afficher*/

        foreach($nom_variable as $nom_table_sql) { /*changer les variables nom_table_sql en fonction de la table sql utilisée*/
            echo 
            "<a href='" . $nom_table_sql["REC_IMAGE"] . "'>" . "<img src='" . $nom_table_sql["REC_IMAGE"] . "' alt='Image recette " . $nom_table_sql['REC_TITRE'] . "' width='500px'/></a>" . "<br>" .
            strtoupper($nom_table_sql["REC_TITRE"]) . "<br>" .
            $nom_table_sql["CAT_INTITULE"] . "<br>" .
            "Resumé :<br>" . $nom_table_sql["REC_RESUME"] . "<br>";
        }
    }
    //ALTER TABLE FORK_RECETTE ADD CONSTRAINT FORK_RECETTE_TAGS_FK FOREIGN KEY (TAG_ID) REFERENCES FORK_TAGS(TAG_ID);
?>
