<?php

require_once('src/models/Manager_recette.php');
require_once('src/controllers/commentaire.php');
require_once('src/lib/database.php');

function liste_recettes() {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettes();
	require('views/liste_recette.php');
}

function details_recette(string $rec_id) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recette = $recetteRepository->getRecette($rec_id);

	$commentaires = liste_commentaires($rec_id);
	if ($recette != false) {
		require('views/details_recette.php');
	}
	else {
		echo "Cette recette n'existe pas";
	}

	
}

function recettes_categorie($type_plat) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesCategorie($type_plat);
	require('views/liste_recette.php');
}

function recettes_ingredients($ingredients) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesIngredients($ingredients);
	require('views/liste_recette.php');
}

function recettes_titre($titre) {
	$recetteRepository = new RecetteRepository();
	$recetteRepository->connection = new DatabaseConnection();
	$recettes = $recetteRepository->getRecettesTitre($titre);
	require('views/liste_recette.php');
}


function creation_recette() {
	require('views/creation_recette.php');
}

function gestion_recette($user_id) {
    $recetteRepository = new RecetteRepository();
    $recetteRepository->connection = new DatabaseConnection();
    $recettes = $recetteRepository->getRecettesUser($user_id);
    require('views/gestion_recette.php');
}

function requete_creation_recette(array $input) {
    if (!empty($input['titre']) && !empty($input['categorie']) && 
        !empty($input['contenu']) && !empty($input['resume']) && 
        !empty($input['lien_image']) && !empty($input['tags'])) {
            $titre = $input['titre'];
            switch ($input['categorie']) {
                case 'Entrée': 
                    $categorie_id = 1;
                    break;
                case 'Plat':
                    $categorie_id = 2;
                    break;
                case 'Dessert':
                    $categorie_id = 3;
                    break;
            }
            $contenu = $input['contenu'];
            $resume = $input['resume'];
            $lien_image = $input['lien_image'];
            $tags = $input['tags'];

            $recetteRepository = new RecetteRepository();
            $recetteRepository->connection = new DatabaseConnection();
            $success = $recetteRepository->createRecette($titre, $contenu, $resume, $tags, $lien_image, $categorie_id);
            if (!$success) {
                throw new Exception('Impossible d\'ajouter la recette !');
            } else {
                header('Location: index.php?action=liste_recette');
            }
	}

}

function suppression_recette($rec_id) {
    $recetteRepository = new RecetteRepository();
    $recetteRepository->connection = new DatabaseConnection();
    $success = $recetteRepository->deleteRecette($rec_id);
    if (!$success) {
        throw new Exception('Impossible de supprimer la recette !');
    } else {
        header('Location: index.php?action=gestion_recette');
    }
}

function modification_recette($id) {
    $recetteRepository = new RecetteRepository();
    $recetteRepository->connection = new DatabaseConnection();
    $recette = $recetteRepository->getRecette($id);
    require('views/modification_recette.php');
}

function requete_modification_recette(array $input, $rec_id) {
    if (!empty($input['titre']) && !empty($input['categorie']) && 
        !empty($input['contenu']) && !empty($input['resume']) && 
        !empty($input['lien_image']) && !empty($input['tags'])) {
            $titre = $input['titre'];
            switch ($input['categorie']) {
                case 'Entrée': 
                    $cat_id = 1;
                    break;
                case 'Plat':
                    $cat_id = 2;
                    break;
                case 'Dessert':
                    $cat_id = 3;
                    break;
            }
            $contenu = $input['contenu'];
            $resume = $input['resume'];
            $lien_image = $input['lien_image'];
            $tags = $input['tags'];

            $recetteRepository = new RecetteRepository();
            $recetteRepository->connection = new DatabaseConnection();
            $success = $recetteRepository->updateRecette($rec_id, $cat_id, $titre, $contenu, $resume, $tags, $lien_image);
            if (!$success) {
                throw new Exception('Impossible de modifier la recette !');
            } else {
                header('Location: index.php?action=gestion_recette');
            }
    }
}

function gerer_recettes() {
    $recetteRepository = new RecetteRepository();
    $recetteRepository->connection = new DatabaseConnection();
    $recettes = $recetteRepository->getRecettes();
    require('views/gestion_recette.php');
}


?>