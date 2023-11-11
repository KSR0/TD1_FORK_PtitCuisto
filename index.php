<?php
	
session_start();


require_once('src/controllers/edito.php');
require_once('src/controllers/liste_recette.php');
require_once('src/controllers/liste_recette_categorie.php');
require_once('src/controllers/liste_recette_titre.php');
require_once('src/controllers/liste_recette_ingredients.php');
require_once('src/controllers/creation_recette.php');
require_once('src/controllers/requete_creation_recette.php');
require_once('src/controllers/details_recette.php');
require_once('src/controllers/connexion_compte.php');
require_once('src/controllers/requete_connexion_compte.php');
require_once('src/controllers/creation_compte.php');
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
				recettes();
			}
		}
		else if ($_GET['action'] === 'pannel') {
			pannel();
		}
		else if ($_GET['action'] === 'details_recette') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				recette($_GET['id']);
			}
		}
		else if ($_GET['action'] === 'connexion_compte') {
			connexion_compte();
		}
		else if ($_GET['action'] === 'edito') {
			if (isset($_GET['deconnexion'])) {
				if(session_status () == PHP_SESSION_ACTIVE) {
					$_SESSION = array();
					session_destroy();
					session_write_close();
				}
				edito();
			}
			else {
				edito();
			}
		}
		else if ($_GET['action'] === 'creation_recette') {
			creation_recette();
		}
		else if ($_GET['action'] === 'requete_creation_recette') {
			requete_creation_recette($_POST);
		}
		else if ($_GET['action'] === 'creation_compte') {
			creation_compte();
		}
		else if ($_GET['action'] === 'requete_creation_compte') {
			requete_creation_compte($_POST);
		}
		else {
			echo "Erreur 404 : la page que vous recherchez n'existe pas.";
		}
	} else {
		edito();
	}
} catch (Exception $e) {
	echo 'Erreur : '.$e->getMessage();
}