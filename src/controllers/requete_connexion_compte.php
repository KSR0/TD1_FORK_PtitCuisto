<?php

require_once('src/models/connexion_compte.php');
require_once('src/lib/database.php');

function requete_creation_compte(array $input) {
    if (!empty($input['email']) && !empty($input['password'])) {
            $email = $input['email'];
            $password = $input['password'];

            $connexionCompteRepository = new ConnexionCompteRepository();
            $connexionCompteRepository->connection = new DatabaseConnection();
            $result = $connexionCompteRepository->userSignIn($email, $password);
            
            $_SESSION['user_id'] = $result['USER_ID'];
            $_SESSION['typ_id'] = $result['TYP_ID'];
            $_SESSION['user_pseudo'] = $result['USER_PSEUDO'];

            header('Location: index.php');
	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

}

?>