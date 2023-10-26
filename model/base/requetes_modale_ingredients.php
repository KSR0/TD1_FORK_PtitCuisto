<?php
    require_once '../../../includes/connexionBDD.php';

    function recupIngredients($bdd) {
        $requete = "SELECT * FROM FORK_RECETTE WHERE" ; /*mettre la requête SQL entre les ""*/
        $reqServeur = $bdd->prepare($requete);
        $reqServeur->execute();
        $nom_variable = $reqServeur->fetchAll(); /*changer le nom_variable en fonction de ce que tu veux afficher*/

        foreach($nom_variable as $nom_table_sql) { /*changer les variables nom_table_sql en fonction de la table sql utilisée*/
            echo "<br>
            ID : ". $nom_table_sql[""] . "<br>" .  /*mettre le nom de la propriété utilisé entre les ""*/
            "Type de compte : ". $nom_table_sql[""] . "<br>"; /*mettre le nom de la propriété utilisé entre les ""*/
        }
    }
?>