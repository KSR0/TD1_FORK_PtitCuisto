<?php
    require_once 'includes/connexionBDD.php';

    function afficherUtilisateurs($bdd) {
        $requete = "SELECT * FROM FORK_UTILISATEUR";
        $reqServeur = $bdd->prepare($requete);
        $reqServeur->execute();
        $utilisateurs = $reqServeur->fetchAll();
    
        foreach($utilisateurs as $utilisateur) {
            echo "ID : " . $utilisateur["USER_ID"] . "<br>" . "Pseudo : "
            . $utilisateur["USER_PSEUDO"] . "<br>" . "Email : "
            . $utilisateur["USER_EMAIL"] . "<br>" . "Date inscription : "
            . $utilisateur["USER_DATE_INS"] . "<br>";
        }
    }
    
?>
