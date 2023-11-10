<?php

require_once('src/models/liste_recette.php');

function recettes_categorie($type_plat) {
	$recetteRepository = new RecetteRepository();
	$recettes = $recetteRepository->getRecettesCategorie($type_plat);
	require('views/liste_recette.php');
}

?>