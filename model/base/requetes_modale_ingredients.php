<?php
    require_once '../../../includes/connexionBDD.php';

    function recupIngredients($bdd) {
        $requete = "SELECT ING_INTITULE FROM FORK_INGREDIENT";
        $reqServeur = $bdd->prepare($requete);
        $reqServeur->execute();
        $resultats = $reqServeur->fetchAll(PDO::FETCH_ASSOC); // Utilisez FETCH_ASSOC pour obtenir un tableau associatif
    
        $ingredients = array();
    
        foreach ($resultats as $resultat) {
            $ingredients[] = $resultat['ING_INTITULE'];
        }
    
        return $ingredients;
    }
    
    
?>