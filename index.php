<?php
	
session_start();

require_once('src/controllers/edito.php');
require_once('src/controllers/recette.php');
require_once('src/controllers/commentaire.php');
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
		else if ($_GET['action'] === 'details_recette') {
			if (isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				details_recette($_GET['rec_id']);
			}
		}
		else if ($_GET['action'] === 'requete_creation_commentaire') {
			if (isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				requete_creation_commentaire($_GET['rec_id'], $_POST);
			} else {
				echo 'Erreur : Pas de commentaire envoyé';
				die;
			}
			
		}
		else if ($_GET['action'] === 'suppression_recette') {
			if(isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				suppression_recette($_GET['rec_id']);
			} else {
				echo 'Erreur : La recette n\'existe pas';
				die;
			}
		}
		else if($_GET['action'] === 'modification_recette') {
			if(isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				modification_recette($_GET['rec_id']);
			} else {
				echo 'Erreur : La recette n\'existe pas';
				die;
			}
		}
		else if($_GET['action'] === 'requete_modification_recette') {
			if(isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				requete_modification_recette($_POST, $_GET['rec_id']);
			} else {
				echo 'Erreur : La recette n\'existe pas';
				die;
			}
		}
		else if ($_GET['action'] === 'creation_compte') {
			creation_compte();
		}
		else if ($_GET['action'] === 'connexion_compte') {
			connexion_compte();
		}
		else if ($_GET['action'] === 'gestion_recette') {
			/* if(isset($_GET['rec_id']) && $_GET['rec_id'] > 0) {
				requete_modification_recette($_POST, $_GET['rec_id']);
			} */
			gestion_recette($_SESSION['user_id']);
		}
		else if ($_GET['action'] === 'requete_connexion_compte') {
			requete_connexion_compte($_POST);
		}
		else if ($_GET['action'] === 'requete_creation_compte') {
			requete_creation_compte($_POST);
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
		else if ($_GET['action'] === 'mon_compte') {
			afficherInfosCompte($_SESSION['user_id']);
		}
		else if ($_GET['action'] === 'modification_mdp') {
			modification_mdp();
		}
		else if ($_GET['action'] === 'modification_compte') {
			afficherInfosModifCompte($_SESSION['user_id']);
		}
		else if ($_GET['action'] === 'requete_changement_mdp') {
			changer_mdp($_POST);
		}
		else if ($_GET['action'] === 'requete_suppression_compte') {
			supprCompte($_SESSION['user_id']);
		}
		else if ($_GET['action'] === 'pannel') {
			pannel();
		}
		else if ($_GET['action'] === 'gerer_utilisateurs') {
			gerer_utilisateurs();
		}
		else if ($_GET['action'] === 'supprimer_utilisateur') {
			if(isset($_GET['user_id']) && $_GET['user_id'] > 0) {
				supprCompte($_GET['user_id']);
			} else {
				echo 'Erreur : L\'utilisateur n\'existe pas';
				die;
			}
		}
		else if ($_GET['action'] === 'bannir_utilisateur') {
			if(isset($_GET['user_id']) && $_GET['user_id'] > 0) {
				bannir_utilisateur($_GET['user_id']);
			} else {
				echo 'Erreur : L\'utilisateur n\'existe pas';
				die;
			}
		}
		else if ($_GET['action'] === 'modifier_utilisateur') {
			if(isset($_GET['user_id']) && $_GET['user_id'] > 0) {
				afficherInfosModifCompte($_GET['user_id']);
			} else {
				echo 'Erreur : L\'utilisateur n\'existe pas';
				die;
			}
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