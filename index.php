<?php

require_once('src/controllers/edito.php');
require_once('src/controllers/liste_recette.php');
require_once('src/controllers/liste_recette_categorie.php');
require_once('src/controllers/liste_recette_titre.php');
require_once('src/controllers/liste_recette_ingredients.php');
require_once('src/controllers/details_recette.php');
require_once('src/controllers/connexion_compte.php');
require_once('src/controllers/creation_compte.php');


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
		else if ($_GET['action'] === 'details_recette') {
			if (isset($_GET['id']) && $_GET['id'] > 0) {
				recette($_GET['id']);
			}
		}
		else if ($_GET['action'] === 'connexion_compte') {
			connexion_compte();
		}
		else if ($_GET['action'] === 'creation_compte') {
			creation_compte();
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