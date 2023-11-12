<?php


class Compte {
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

class CompteRepository {
    public DatabaseConnection $connection;


    public function userSignIn($email, $password) {
        $password = hash('sha512', $password);

        $fetchUserData = "SELECT USER_ID,USER_PSEUDO,TYP_ID, COUNT(*) as nb FROM FORK_UTILISATEUR WHERE USER_EMAIL = ? AND USER_MDP = ?";
        
        $requeteConnexionCompte = $this->connection->getConnection()->prepare($fetchUserData);
        $requeteConnexionCompte->execute([$email, $password]);
        
        $infosUser = $requeteConnexionCompte->fetch();

        return $infosUser;
    }

    public function editeurChangerMdp($old_password, $new_password) {
        $old_password = hash('sha512', $old_password);
        $new_password = hash('sha512', $new_password);
        
        // VERIFIE QU'IL CONNAIT SON ANCIEN MDP
        $fetchUserData = "SELECT USER_ID FROM FORK_UTILISATEUR WHERE USER_ID = ? AND USER_MDP = ?";
        
        $requeteConnexionCompte = $this->connection->getConnection()->prepare($fetchUserData);
        $requeteConnexionCompte->execute([$_SESSION['user_id'], $old_password]);
        
        if ($requeteConnexionCompte->rowCount() != 1) {
            throw new Exception('Ancien mot de passe incorrect');
        }

        // SI SON ANCIEN MDP EST CORRECT ON CHANGE SON NVO MDP
        $updateEditeurMdp = "UPDATE FORK_UTILISATEUR SET USER_MDP = ?, USER_DATE_MODIF = NOW() WHERE USER_ID = ?";

        $requeteUpdateEditeurMdp = $this->connection->getConnection()->prepare($updateEditeurMdp);
        $requeteUpdateEditeurMdp->execute([$new_password, $_SESSION['user_id']]);

        //echo $new_password . ' ';
        //throw new Exception('RIEN');
        
        return $requeteUpdateEditeurMdp->rowCount() > 0;
    }
}