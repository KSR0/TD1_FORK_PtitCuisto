<?php


    $db_host = parse_ini_file('../../../all_secret_variables.env')["DB_HOST"];
    $db_name = parse_ini_file('../../../all_secret_variables.env')["DB_NAME"];
    $db_encode = parse_ini_file('../../../all_secret_variables.env')["DB_ENCODE"];
    $db_username = parse_ini_file('../../../all_secret_variables.env')["DB_USERNAME"];
    $db_password = parse_ini_file('../../../all_secret_variables.env')["DB_PASSWORD"];

    // Test de connexion
    try {
        $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);
    }

    // Gestion des erreurs
    catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $requete = "SELECT REC_TITRE FROM FORK_RECETTE WHERE REC_TITRE LIKE '" . $_GET["saisie"] . "%' ";
    $stmt = $bdd->prepare($requete);
    $stmt->execute();
    $resultats = $stmt->fetchAll();

    foreach($resultats as $resultat) {
        echo '<option value="'.$resultat['REC_TITRE'].'">'.$resultat['REC_TITRE'].'<br>';
    }
?>