<?php
    require_once 'templates/header.php';

    require_once 'includes/connexionBDD.php';

    $requete = "SELECT * FROM FORK_UTILISATEUR";
    
    $reqServeur = $bdd->prepare($requete);
    $reqServeur->execute();
    $utilisateurs = $reqServeur->fetchAll();
    foreach($utilisateurs as $utilisateur) {
        echo "ID : " . $utilisateur["USER_ID"] . "<PRE></br></PRE>" . "Pseudo : " . $utilisateur["USER_PSEUDO"] . "<PRE></br></PRE>" . "Email : " . $utilisateur["USER_EMAIL"] . "<PRE></br></PRE>" . "Date inscription : " . $utilisateur["USER_DATE_INS"] . "<PRE></br></PRE>";
    }

    require_once 'templates/footer.php';
?>
