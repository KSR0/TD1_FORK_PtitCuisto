<?php


class Commentaire {
    public int $com_id;
    public int $rec_id;
    public string $user_pseudo;
    public string $com_description;
    public string $com_date_crea;
}

class CommentaireRepository {
    public DatabaseConnection $connection;

    public function getCommentaires($rec_id): array 
    {
        $requeteCommentaires = $this->connection->getConnection()->query(
            "SELECT COM_ID, REC_ID, USER_PSEUDO, COM_DESCRIPTION, COM_DATE_CREA FROM FORK_COMMENTAIRE JOIN FORK_UTILISATEUR USING(USER_ID) ORDER BY COM_DATE_CREA DESC;"
        );
        $commentaires = [];
        while (($row = $requeteCommentaires->fetch())) {
            $commentaire = new Commentaire();
            $commentaire->com_id = $row['COM_ID'];
            $commentaire->rec_id = $row['REC_ID'];
            $commentaire->user_pseudo = $row['USER_PSEUDO'];
            $commentaire->com_description = $row['COM_DESCRIPTION'];
            $commentaire->com_date_crea = $row['COM_DATE_CREA'];
            

            $commentaires[] = $commentaire;
        }
        return $commentaires;
    }

    public function addCommentaire($rec_id, $array) {
        $requeteNewIdCommentaire = $this->connection->getConnection()->query("SELECT MAX(com_id) + 1 as com_id FROM FORK_COMMENTAIRE");
        $IdCommentaire = $requeteNewIdCommentaire->fetch();
        $IdCommentaire = $IdCommentaire['com_id'];
        
        
        //INSERTION DANS FORK_RECETTE
        $requeteCreeCommentaire = $this->connection->getConnection()->prepare(
            "INSERT INTO FORK_COMMENTAIRE(com_id, rec_id, user_id, com_description, com_date_crea) VALUES (
                $IdCommentaire,
                ?,
                ?,
                ?,
                NOW())"
        );

        $commentaireRequestAffectedLines = $requeteCreeCommentaire->execute([ 
            $rec_id, 
            $_SESSION['user_id'],
            $array['commentaire']
        ]);

        return $commentaireRequestAffectedLines > 0;
    }

    
}

?>
