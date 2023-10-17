<?php
    require_once 'includes/connexionBDD.php';

    function afficherUtilisateurs($bdd) {
        $requete = "SELECT * FROM FORK_TYPE";
        $reqServeur = $bdd->prepare($requete);
        $reqServeur->execute();
        $types = $reqServeur->fetchAll();
    
        echo '<p class="text-charte_bleu_clair">Types de comptes existants :</p>';

        foreach($types as $types_comptes) {
            echo "<br>
            ID : ". $types_comptes["TYP_ID"] . "<br>" . 
            "Type de compte : ". $types_comptes["TYP_INTITULE"] . "<br>";
        }
    }
    
?>
