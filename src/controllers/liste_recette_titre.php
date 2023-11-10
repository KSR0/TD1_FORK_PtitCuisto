<?php

require_once('src/models/liste_recette.php');

function recettes_titre($titre) {
	$recetteRepository = new RecetteRepository();
	$recettes = $recetteRepository->getRecettesTitre($titre);
	require('views/liste_recette.php');
}

?>