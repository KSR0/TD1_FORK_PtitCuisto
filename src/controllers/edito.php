<?php

require_once('src/models/recette.php');
require_once('src/lib/database.php');

function edito() {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettes();
	require('views/edito.php');
}
?>