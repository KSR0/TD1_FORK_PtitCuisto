<?php

require_once('src/models/liste_recette.php');

function recettes_ingredients($ingredients) {
	$recetteRepository = new RecetteRepository();
	$recettes = $recetteRepository->getRecettesIngredients($ingredients);
	require('views/liste_recette.php');
}

?>