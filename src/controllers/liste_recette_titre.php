<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');

function recettes_titre($titre) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesTitre($titre);
	require('views/liste_recette.php');
}

?>