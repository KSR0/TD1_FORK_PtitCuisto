<?php

require_once('src/models/liste_recette.php');

function recette(string $identifier) {
	$recetteRepository = new RecetteRepository();
	$recette = $recetteRepository->getRecette($identifier);
	if ($recette != false) {
		require('views/details_recette.php');
	}
	else {
		echo "Cette recette n'existe pas";
	}
}
?>