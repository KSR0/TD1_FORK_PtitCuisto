<?php

require_once('src/models/Manager_commentaire.php');
require_once('src/lib/database.php');

function liste_commentaires(string $rec_id) {
	$commentaireRepository = new CommentaireRepository();
	$commentaireRepository->connection = new DatabaseConnection();
	$commentaires = $commentaireRepository->getCommentaires($rec_id);
	return $commentaires;
}

function requete_creation_commentaire($rec_id, $input) {
	$commentaireRepository = new CommentaireRepository();
	$commentaireRepository->connection = new DatabaseConnection();
	$success = $commentaireRepository->addCommentaire($rec_id, $input);
	if (!$success) {
		throw new Exception('Impossible d\'ajouter le commentaire !');
	} else {
		header("Location: index.php?action=details_recette&rec_id=$rec_id");
	}
}



?>