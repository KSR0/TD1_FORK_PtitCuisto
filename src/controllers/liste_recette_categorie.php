<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');

function recettes_categorie($type_plat) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesCategorie($type_plat);
	require('views/liste_recette.php');
}

?>