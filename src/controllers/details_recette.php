<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');

function recette(string $identifier) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recette = $recetteRepository->getRecette($identifier);
	if ($recette != false) {
		require('views/details_recette.php');
	}
	else {
		echo "Cette recette n'existe pas";
	}
}
?>