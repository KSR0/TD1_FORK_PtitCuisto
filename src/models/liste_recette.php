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
    public ?PDO $bdd = null;

    public function dbConnect()
    {
        $db_host = parse_ini_file('all_secret_variables.env')["DB_HOST"];
        $db_name = parse_ini_file('all_secret_variables.env')["DB_NAME"];
        $db_encode = parse_ini_file('all_secret_variables.env')["DB_ENCODE"];
        $db_username = parse_ini_file('all_secret_variables.env')["DB_USERNAME"];
        $db_password = parse_ini_file('all_secret_variables.env')["DB_PASSWORD"];

        if ($this->bdd == null) {
            $this->bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);
        }
    }

    public function getRecettes(): array 
    {
        $this->dbConnect($this);
        $requeteRecettes = $this->bdd->query(
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
            
            $requeteTags = $this->bdd->prepare(
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
        
        $this->dbConnect($this);
        $requeteRecette = $this->bdd->prepare(
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

            $requeteTags = $this->bdd->prepare(
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
        $this->dbConnect($this);
        $requeteRecettes = $this->bdd->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_UTILISATEUR USING(USER_ID) WHERE CAT_INTITULE = ? ORDER BY REC_TITRE ASC;"
        );
        $requeteRecettes->execute([$type_filtre]);
        $recettes = [];

        
        
        while (($row = $requeteRecettes->fetch())) {
            echo 'id' . $row['REC_ID'];
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
            
            $requeteTags = $this->bdd->prepare(
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
        $this->dbConnect($this);
        $requeteRecettes = $this->bdd->prepare(
            "SELECT REC_ID, CAT_ID, REC_IMAGE, REC_TITRE, REC_CONTENU, REC_RESUME, CAT_INTITULE, REC_DATE_CREA, REC_DATE_MODIF, USER_ID, USER_PSEUDO FROM FORK_RECETTE JOIN FORK_CATEGORIE USING(CAT_ID) JOIN FORK_UTILISATEUR USING(USER_ID) WHERE REC_TITRE LIKE ? ORDER BY REC_TITRE ASC;"
        );
        $requeteRecettes->execute([$titre]);

        $recettes = [];

        while (($row = $requeteRecettes->fetch())) {
            echo 'id' . $row['REC_ID'];
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
            
            $requeteTags = $this->bdd->prepare(
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
        $this->dbConnect($this);
    
        $conditions = [];
        $parametres = [];
        $ingredients = explode(',', $ingredients);
    
        foreach ($ingredients as $ingredient) {
            $conditions[] = "REC_CONTENU LIKE CONCAT('%', ?, '%')";
            $parametres[] = $ingredient;
        }
    
        $conditionCombinee = implode(' AND ', $conditions);
    
        $requeteRecettes = $this->bdd->prepare(
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
            echo 'id' . $row['REC_ID'];
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
            
            $requeteTags = $this->bdd->prepare(
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
    
}

?>
