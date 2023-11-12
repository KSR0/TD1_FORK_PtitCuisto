<?php

require_once('src/models/compte.php');
require_once('src/lib/database.php');


function connexion_compte() {
	require('views/connexion_compte.php');
}

function creation_compte() {
	require('views/creation_compte.php');
}

function requete_connexion_compte(array $input) {
	if (!empty($input['email']) && !empty($input['password'])) {
		$email = $input['email'];
		$password = $input['password'];

		$CompteRepository = new CompteRepository();
		$CompteRepository->connection = new DatabaseConnection();
		$result = $CompteRepository->userSignIn($email, $password);
		
		if ($result['nb'] == 0) {
			throw new Exception('L\'identifiant, le mot de passe est incorrecte');
		}
		else {
			$_SESSION['user_id'] = $result['USER_ID'];
			$_SESSION['typ_id'] = $result['TYP_ID'];
			$_SESSION['user_pseudo'] = $result['USER_PSEUDO'];
				
			header('Location: index.php');
		}
	} else {
		throw new Exception('Les données du formulaire sont invalides.');
	}
    
}

function gerer_compte() {
	require('views/gerer_compte.php');
}

function changer_mdp($input) {
	$old_password = $input['old_password'];
	$new_password = $input['new_password'];

	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$result = $CompteRepository->editeurChangePassword($old_password, $new_password);
	
	if ($result != 1) {
		throw new Exception('Une erreur est survenu');
	} else {
		header('Location: index.php?action=edito');
	}
}

function supprCompte() {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$result = $CompteRepository->editeurDeleteAccount();

	if ($result != 1) {
		throw new Exception('Une erreur est survenu');
	} else {
		header('Location: index.php?action=edito');
	}
}
?>