<?php
	
session_start();


require_once('src/controllers/edito.php');
require_once('src/controllers/recette.php');
require_once('src/controllers/compte.php');
require_once('src/controllers/pannel.php');



try {
	if (isset($_GET['action']) && $_GET['action'] !== '') {
		if ($_GET['action'] === 'liste_recette') {
			if (isset($_GET['type_plat'])) {
				recettes_categorie($_GET['type_plat']);
			} 
			else if (isset($_GET['titre'])) {
				recettes_titre($_GET['titre']);
			}
			else if (isset($_GET['ingredients'])) {
				recettes_ingredients($_GET['ingredients']);
			}
			else {
				liste_recettes();
			}
		}
		else if ($_GET['action'] === 'pannel') {
			pannel();
		}
		else if ($_GET['action'] === 'details_recette') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				details_recette($_GET['id']);
			}
		}
		else if ($_GET['action'] === 'creation_compte') {
			creation_compte();
		}
		else if ($_GET['action'] === 'connexion_compte') {
			connexion_compte();
		}
		else if ($_GET['action'] === 'requete_connexion_compte') {
			requete_connexion_compte($_POST);
		}
		else if ($_GET['action'] === 'edito') {
			if (isset($_GET['deconnexion'])) {
				if(session_status () == PHP_SESSION_ACTIVE) {
					$_SESSION = array();
					session_destroy();
					session_write_close();
				}
			}
			edito();
		}
		else if ($_GET['action'] === 'creation_recette') {
			creation_recette();
		}
		else if ($_GET['action'] === 'requete_creation_recette') {
			requete_creation_recette($_POST);
		}
		else if ($_GET['action'] === 'gerer_compte') {
			gerer_compte();
		}
		else if ($_GET['action'] === 'requete_changement_mdp') {
			changer_mdp($_POST);
		}
		
		else {
			header("Location: views/error_page.php");
			die();
		}
	} else {
		edito();
	}
} catch (Exception $e) {
	echo 'Erreur : '.$e->getMessage();
}