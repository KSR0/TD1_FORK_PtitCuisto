<?php

require_once('src/models/connexion_compte.php');
require_once('src/lib/database.php');

function requete_creation_recette(array $input) {
    if (!empty($input['titre']) && !empty($input['categorie']) && 
        !empty($input['contenu']) && !empty($input['resume']) && 
        !empty($input['lien_image']) && !empty($input['tags'])) {
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

            $connexionCompteRepository = new ConnexionCompteRepository();
            $connexionCompteRepository->connection = new DatabaseConnection();
            $success = $connexionCompteRepository->userSignIn($titre, $contenu, $resume, $tags, $lien_image, $categorie_id);
            if (!$success) {
                throw new Exception('Impossible de se connecter !');
            } else {
                header('Location: index.php');
            }
	} else {
    	throw new Exception('Les données du formulaire sont invalides.');
	}

}

?>