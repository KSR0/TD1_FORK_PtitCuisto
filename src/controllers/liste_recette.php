<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');

function recettes() {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettes();
	require('views/liste_recette.php');
}

?>