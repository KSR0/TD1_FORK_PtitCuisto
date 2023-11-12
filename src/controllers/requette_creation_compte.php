<?php

require_once('src/models/creation_compte.php');
require_once('src/lib/database.php');

function requete_creation_compte(array $input) {
    if (!empty($input['pseudo']) && !empty($input['nom']) && !empty($input['prenom']) && !empty($input['email']) && !empty($input['password']) && !empty($input['confirm-password'])) {
            $pseudo = $input['pseudo'];
            $nom = $input['nom'];
            $prenom = $input['prenom'];
            $email = $input['email'];
            $password = $input['password'];
            $confirm_password = $input['confirm-password'];

            $creationCompteRepository = new CreationCompteRepository();
            $creationCompteRepository->connection = new DatabaseConnection();
            $result = $creationCompteRepository->userSignUp($pseudo, $nom, $prenom, $email, $password, $confirm_password);
            
            header('Location: index.php');
	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

}

?>