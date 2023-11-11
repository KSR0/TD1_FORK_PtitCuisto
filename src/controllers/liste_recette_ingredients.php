<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');


function recettes_ingredients($ingredients) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesIngredients($ingredients);
	require('views/liste_recette.php');
}

?>