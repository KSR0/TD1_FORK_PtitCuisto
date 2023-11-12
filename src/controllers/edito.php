<?php
function edito() {
	$recetteRepository = new RecetteRepository();
	$recettes = $recetteRepository->getRecettes();
	require('views/edito.php');
}
?>