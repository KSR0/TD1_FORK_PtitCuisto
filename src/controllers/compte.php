<?php

require_once('src/models/Manager_compte.php');
require_once('src/lib/database.php');
require_once('src/controllers/edito.php');



function connexion_compte() {
	require('views/connexion_compte.php');
}

function creation_compte() {
	require('views/creation_compte.php');
}

function modification_mdp() {
	require('views/modification_mdp.php');
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
				
			header('Location: index.php?action=edito');
		}
	} else {
		throw new Exception('Les données du formulaire sont invalides.');
	}
    
}

function requete_creation_compte(array $input) {
    if (!empty($input['pseudo']) && !empty($input['nom']) && !empty($input['prenom']) && !empty($input['email']) && !empty($input['password']) && !empty($input['confirm-password'])) {
            $pseudo = $input['pseudo'];
            $nom = $input['nom'];
            $prenom = $input['prenom'];
            $email = $input['email'];
            $password = $input['password'];
            $confirm_password = $input['confirm-password'];

            $creationCompteRepository = new CompteRepository();
            $creationCompteRepository->connection = new DatabaseConnection();
            $result = $creationCompteRepository->userSignUp($pseudo, $nom, $prenom, $email, $password, $confirm_password);
            
            header('Location: index.php?action=edito');
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

function supprCompte($user_id) {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$result = $CompteRepository->deleteAccount($user_id);
	

	if ($result != 1) {
		throw new Exception('La suppression du compte n\'a pas fonctionné');
	} else {
		if ($user_id == $_SESSION['user_id']) {
			$_SESSION = array();
			session_destroy();
			session_write_close();
			edito();
			require('views/edito.php');
		} else {
			gerer_utilisateurs(); // Recharge la liste d'utilisateurs après avoir (de)banni qql
			require('views/gerer_utilisateurs.php');
		}
	}
}

function afficherInfosCompte($user_id) {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$compte = $CompteRepository->displayAccountData($user_id);

	require('views/mon_compte.php');
}

function afficherInfosModifCompte($user_id) {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$compte = $CompteRepository->displayAccountData($user_id);

	require('views/modification_compte.php');
}

function gerer_utilisateurs() {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$utilisateurs = $CompteRepository->displayAllUsers();

	require('views/gerer_utilisateurs.php');
}

function bannir_utilisateur($user_id) {
	$CompteRepository = new CompteRepository();
	$CompteRepository->connection = new DatabaseConnection();
	$result = $CompteRepository->banAccount($user_id);

	if ($result != 1) {
		throw new Exception('Une erreur est survenu');
	}
	gerer_utilisateurs(); // Recharge la liste d'utilisateurs après avoir (de)banni qql
	require('views/gerer_utilisateurs.php');
}
?>