<?php


class Recette {
    public int $rec_id;
    public int $cat_id;
    public int $user_id;
    public string $rec_titre;
    public string $rec_contenu;
    public string $rec_resume;
    public string $rec_image;
    public string $cat_intitule;
    public string $tags_intitule;
    public string $rec_date_crea;
    public string $rec_date_modif;
    public string $user_pseudo;
}

class RecetteRepository {
    public DatabaseConnection $connection;

    public function getRecettes(): array 
    {
        $requeteRecettes = $this->connection->getConnection()->query(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_UTILISATEUR USING(USER_ID) ORDER BY rec_date_crea DESC;"
        );
        $recettes = [];
        while (($row = $requeteRecettes->fetch())) {
            $recette = new Recette();
            $recette->rec_id = $row['REC_ID'];
            $recette->cat_id = $row['CAT_ID'];
            $recette->user_id = $row['USER_ID'];
            $recette->rec_titre = $row['REC_TITRE'];
            $recette->rec_contenu = $row['REC_CONTENU'];
            $recette->rec_resume = $row['REC_RESUME'];
            $recette->rec_image = $row['REC_IMAGE'];
            $recette->cat_intitule = $row['CAT_INTITULE'];
            $recette->rec_date_crea = $row['REC_DATE_CREA'];
            $recette->rec_date_modif = $row['REC_DATE_MODIF'];
            $recette->user_pseudo = $row['USER_PSEUDO'];
            
            $requeteTags = $this->connection->getConnection()->prepare(
                "SELECT TAG_INTITULE FROM FORK_TAGS JOIN FORK_MENTIONNER USING(TAG_ID) JOIN FORK_RECETTE USING(REC_ID) WHERE REC_ID = ?"
            );
            $requeteTags->execute([$recette->rec_id]);
            $recette->tags_intitule = '';
            while (($row = $requeteTags->fetch())) {
                $recette->tags_intitule .= '#' . $row['TAG_INTITULE'] . ' ';
            }
            $recettes[] = $recette;
        }
        return $recettes;
    }

    public function getRecette(string $identifiant) {
        $requeteRecette = $this->connection->getConnection()->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, TAG_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_MENTIONNER USING(REC_ID) JOIN FORK_TAGS USING(TAG_ID) JOIN FORK_UTILISATEUR USING(USER_ID) WHERE REC_ID = ?"
        );
        $requeteRecette->execute([$identifiant]);
        
        $row = $requeteRecette->fetch();

        if (!empty($row['REC_ID'])) {
            $recette = new Recette();
            $recette->rec_id = $row['REC_ID'];
            $recette->cat_id = $row['CAT_ID'];
            $recette->user_id = $row['USER_ID'];
            $recette->rec_titre = $row['REC_TITRE'];
            $recette->rec_contenu = $row['REC_CONTENU'];
            $recette->rec_resume = $row['REC_RESUME'];
            $recette->rec_image = $row['REC_IMAGE'];
            $recette->cat_intitule = $row['CAT_INTITULE'];
            $recette->tags_intitule = $row['TAG_INTITULE'];
            $recette->rec_date_crea = $row['REC_DATE_CREA'];
            $recette->rec_date_modif = $row['REC_DATE_MODIF'];
            $recette->user_pseudo = $row['USER_PSEUDO'];

            $requeteTags = $this->connection->getConnection()->prepare(
                "SELECT TAG_INTITULE FROM FORK_TAGS JOIN FORK_MENTIONNER USING(TAG_ID) JOIN FORK_RECETTE USING(REC_ID) WHERE REC_ID = ?"
            );
            $requeteTags->execute([$recette->rec_id]);
            $recette->tags_intitule = '';
            while (($row = $requeteTags->fetch())) {
                $recette->tags_intitule .= '#' . $row['TAG_INTITULE'] . ' ';
            }
        
            return $recette;
        }
        else {
            return false;
        }
    }

    public function getRecettesCategorie($type_filtre): array {
        $requeteRecettes = $this->connection->getConnection()->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_UTILISATEUR USING(USER_ID) WHERE CAT_INTITULE = ? ORDER BY REC_TITRE ASC;"
        );
        $requeteRecettes->execute([$type_filtre]);
        $recettes = [];

        
        
        while (($row = $requeteRecettes->fetch())) {
            $recette = new Recette();
            $recette->rec_id = $row['REC_ID'];
            $recette->cat_id = $row['CAT_ID'];
            $recette->user_id = $row['USER_ID'];
            $recette->rec_titre = $row['REC_TITRE'];
            $recette->rec_contenu = $row['REC_CONTENU'];
            $recette->rec_resume = $row['REC_RESUME'];
            $recette->rec_image = $row['REC_IMAGE'];
            $recette->cat_intitule = $row['CAT_INTITULE'];
            $recette->rec_date_crea = $row['REC_DATE_CREA'];
            $recette->rec_date_modif = $row['REC_DATE_MODIF'];
            $recette->user_pseudo = $row['USER_PSEUDO'];
            
            $requeteTags = $this->connection->getConnection()->prepare(
                "SELECT TAG_INTITULE FROM FORK_TAGS JOIN FORK_MENTIONNER USING(TAG_ID) JOIN FORK_RECETTE USING(REC_ID) WHERE REC_ID = ?"
            );
            $requeteTags->execute([$recette->rec_id]);
            $recette->tags_intitule = '';
            while (($row = $requeteTags->fetch())) {
                $recette->tags_intitule .= '#' . $row['TAG_INTITULE'] . ' ';
            }
            $recettes[] = $recette;
        }

        return $recettes;
    }

    public function getRecettesTitre($titre) {
        $requeteRecettes = $this->connection->getConnection()->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_UTILISATEUR USING(USER_ID) WHERE REC_TITRE LIKE ? ORDER BY REC_TITRE ASC;"
        );
        $requeteRecettes->execute([$titre]);

        $recettes = [];

        while (($row = $requeteRecettes->fetch())) {
            $recette = new Recette();
            $recette->rec_id = $row['REC_ID'];
            $recette->cat_id = $row['CAT_ID'];
            $recette->user_id = $row['USER_ID'];
            $recette->rec_titre = $row['REC_TITRE'];
            $recette->rec_contenu = $row['REC_CONTENU'];
            $recette->rec_resume = $row['REC_RESUME'];
            $recette->rec_image = $row['REC_IMAGE'];
            $recette->cat_intitule = $row['CAT_INTITULE'];
            $recette->rec_date_crea = $row['REC_DATE_CREA'];
            $recette->rec_date_modif = $row['REC_DATE_MODIF'];
            $recette->user_pseudo = $row['USER_PSEUDO'];
            
            $requeteTags = $this->connection->getConnection()->prepare(
                "SELECT TAG_INTITULE FROM FORK_TAGS JOIN FORK_MENTIONNER USING(TAG_ID) JOIN FORK_RECETTE USING(REC_ID) WHERE REC_ID = ?"
            );
            $requeteTags->execute([$recette->rec_id]);
            $recette->tags_intitule = '';
            while (($row = $requeteTags->fetch())) {
                $recette->tags_intitule .= '#' . $row['TAG_INTITULE'] . ' ';
            }
            $recettes[] = $recette;
        }

        return $recettes;
        
    }

    public function getRecettesIngredients($ingredients) {
        $conditions = [];
        $parametres = [];
        $ingredients = explode(',', $ingredients);
    
        foreach ($ingredients as $ingredient) {
            $conditions[] = "REC_CONTENU LIKE CONCAT('%', ?, '%')";
            $parametres[] = $ingredient;
        }
    
        $conditionCombinee = implode(' AND ', $conditions);
    
        $requeteRecettes = $this->connection->getConnection()->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO
            FROM FORK_RECETTE
            JOIN FORK_CATEGORIE USING(CAT_ID)
            JOIN FORK_UTILISATEUR USING(USER_ID)
            WHERE ($conditionCombinee)
            ORDER BY REC_TITRE ASC;"
        );
        
        $requeteRecettes->execute($parametres);
    
        $recettes = [];
    
        while (($row = $requeteRecettes->fetch())) {
            $recette = new Recette();
            $recette->rec_id = $row['REC_ID'];
            $recette->cat_id = $row['CAT_ID'];
            $recette->user_id = $row['USER_ID'];
            $recette->rec_titre = $row['REC_TITRE'];
            $recette->rec_contenu = $row['REC_CONTENU'];
            $recette->rec_resume = $row['REC_RESUME'];
            $recette->rec_image = $row['REC_IMAGE'];
            $recette->cat_intitule = $row['CAT_INTITULE'];
            $recette->rec_date_crea = $row['REC_DATE_CREA'];
            $recette->rec_date_modif = $row['REC_DATE_MODIF'];
            $recette->user_pseudo = $row['USER_PSEUDO'];
            
            $requeteTags = $this->connection->getConnection()->prepare(
                "SELECT TAG_INTITULE FROM FORK_TAGS JOIN FORK_MENTIONNER USING(TAG_ID) JOIN FORK_RECETTE USING(REC_ID) WHERE REC_ID = ?"
            );
            $requeteTags->execute([$recette->rec_id]);
            $recette->tags_intitule = '';
            while (($row = $requeteTags->fetch())) {
                $recette->tags_intitule .= '#' . $row['TAG_INTITULE'] . ' ';
            }
            $recettes[] = $recette;
        }
    
        return $recettes;
    }


    public function createRecette($titre, $contenu, $resume, $tags, $lien_image, $categorie_id) {
        $requeteNewIdRecette = $this->connection->getConnection()->query("SELECT MAX(rec_id) + 1 as rec_id FROM FORK_RECETTE");
        $IdRecette = $requeteNewIdRecette->fetch();
        $IdRecette = $IdRecette['rec_id'];
        
        
        //INSERTION DANS FORK_RECETTE
        $requeteCreeRecette = $this->connection->getConnection()->prepare(
            "INSERT INTO FORK_RECETTE(rec_id, cat_id, user_id, rec_titre, 
            rec_contenu, rec_resume, rec_image, rec_date_crea, rec_date_modif) VALUES (
                $IdRecette,
                ?,
                ?,
                ?,
                ?,
                ?,
                ?,
                NOW(),
                NOW())"
        );

        $recetteRequestAffectedLines = $requeteCreeRecette->execute([
            $categorie_id, 
            $_SESSION['user_id'],
            $titre, 
            $contenu, 
            $resume, 
            $lien_image
        ]);
        

        //INSERTION DANS FORK_TAGS
        //Transformation de la requete pour insertion dans FORK_TAGS
        $tagsArray = explode(', ', $tags);
        $cmpt = 1;
        $strInsertionTAGS = 'INSERT IGNORE INTO FORK_TAGS(tag_id, tag_intitule) ';
        foreach ($tagsArray as $tag) {
            $strInsertionTAGS .= "SELECT MAX(tag_id) + $cmpt, '$tag' FROM FORK_TAGS UNION ";
            $cmpt++;
        }
        $strInsertionTAGS = substr($strInsertionTAGS, 0, -7) . ";";

        //NE FONCTIONNE PAS...
        //$strInsertionTAGS = $this->connection->getConnection()->quote(substr($strInsertionTAGS, 0, -7));
        $tagsRequestAffectedLines = $this->connection->getConnection()->query($strInsertionTAGS);
        

        //RECUPERATION DES ID DES TAGS VENANT D'ETRE CREE OU DEJA EXISTANT
        $strFetchTags = "SELECT tag_id FROM FORK_TAGS WHERE TAG_INTITULE IN (";
        foreach ($tagsArray as $tag) {
            $strFetchTags .= "'$tag', ";
        }
        $strFetchTags = substr($strFetchTags, 0, -2) . ");";
        $requeteFetchNewTags = $this->connection->getConnection()->query($strFetchTags);

        //INSERTION DANS FORK_MENTIONNER
        $strInsertionMENTIONNER = "INSERT INTO FORK_MENTIONNER(rec_id, tag_id) VALUES ";
        while (($row = $requeteFetchNewTags->fetch())) {
            $strInsertionMENTIONNER .= "($IdRecette, " . $row['tag_id'] . "), ";
        }
        $strInsertionMENTIONNER = substr($strInsertionMENTIONNER, 0, -2) . ";";
        $tagsAddedInMENTIONNERAffectedLines = $this->connection->getConnection()->query($strInsertionMENTIONNER);
        $tagsAddedInMENTIONNERAffectedLines = 1;


        return ($recetteRequestAffectedLines > 0 && $tagsAddedInMENTIONNERAffectedLines > 0);
    }


    
}

?>
