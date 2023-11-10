<?php

require_once('src/models/liste_recette.php');
require_once('src/lib/database.php');

function requete_creation_recette(array $input) {
    if (!empty($input['pseudo']) && !empty($input['titre']) && 
        !empty($input['categorie']) && !empty($input['contenu']) && 
        !empty($input['resume']) && !empty($input['lien_image']) &&
        !empty($input['tags'])) {
            $pseudo = $input['pseudo'];
            $titre = $input['titre'];
            switch ($input['categorie']) {
                case 'entree': 
                    $categorie_id = 1;
                    break;
                case 'plat':
                    $categorie_id = 2;
                    break;
                case 'dessert':
                    $categorie_id = 3;
                    break;
            }
            $contenu = $input['contenu'];
            $resume = $input['resume'];
            $lien_image = $input['lien_image'];
            $tags = $input['tags'];

            $recetteRepository = new RecetteRepository();
            $recetteRepository->connection = new DatabaseConnection();
            $success = $recetteRepository->createRecette($titre, $contenu, $resume, $tags, $lien_image, $pseudo, $categorie_id);
            if (!$success) {
                throw new Exception('Impossible d\'ajouter le commentaire !');
            } else {
                header('Location: index.php?action=liste_recette');
            }
	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

}

?>