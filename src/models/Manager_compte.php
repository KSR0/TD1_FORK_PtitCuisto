<?php


class Compte {
    public int $user_id;
    public int $typ_id;
    public string $typ_intitule;
    public int $sta_id;
    public string $sta_intitule;
    public string $user_pseudo;
    public string $user_email;
    public string $user_prenom;
    public string $user_nom;
    public string $user_date_ins;
    public string $user_date_modif;

    public int $rec_id;
    public int $cat_id;
    public string $rec_titre;
    public string $rec_contenu;
    public string $rec_resume;
    public string $rec_image;
    public string $cat_intitule;
    public string $tags_intitule;
    public string $rec_date_crea;
    public string $rec_date_modif;
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

    public function userSignUp($pseudo, $nom, $prenom, $email, $password, $confirm_password) {

        $passwordhash = hash('sha512', $password);
    
        $querymaxid = "SELECT MAX(USER_ID)+1 FROM FORK_UTILISATEUR";
        $stmtmaxid = $this->connection->getConnection()->prepare($querymaxid);
        $stmtmaxid->execute();
        $maxid = $stmtmaxid->fetch(PDO::FETCH_ASSOC);
        $maxid = $maxid["MAX(USER_ID)+1"];

        $queryemailexistante = "SELECT COUNT(*) FROM FORK_UTILISATEUR WHERE USER_EMAIL = ?";
        $stmtemailexistante = $this->connection->getConnection()->prepare($queryemailexistante);
        $stmtemailexistante->execute([$email]);
        $emailexiste = $stmtemailexistante->fetch(PDO::FETCH_ASSOC);
        $emailexiste = $emailexiste["COUNT(*)"];

        $querypseudoexistant = "SELECT COUNT(*) FROM FORK_UTILISATEUR WHERE USER_PSEUDO = ?";
        $stmtpseudoexistant = $this->connection->getConnection()->prepare($querypseudoexistant);
        $stmtpseudoexistant->execute([$pseudo]);
        $pseudoexiste = $stmtpseudoexistant->fetch(PDO::FETCH_ASSOC);
        $pseudoexiste = $pseudoexiste["COUNT(*)"];


        $query = "INSERT INTO FORK_UTILISATEUR (USER_ID, TYP_ID, STA_ID, USER_EMAIL, USER_MDP, USER_NOM, USER_PRENOM, USER_PSEUDO, USER_DATE_INS, USER_DATE_MODIF) VALUES (?, 2, 1, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        $stmt = $this->connection->getConnection()->prepare($query);

        if(strtoupper($pseudo) == "ADMIN") {
            throw new Exception('Pseudo non disponible');
        }
        else if($password != $confirm_password) {
            throw new Exception('Les mots de passe ne correspondent pas');
        }
        else if($pseudoexiste == 1) {
            throw new Exception('Pseudo déjà utilisé');
        }
        else if($emailexiste == 1) {
            throw new Exception('Email déjà utilisé');
        }
        
        $stmt->execute([$maxid, $email, $passwordhash, $nom, $prenom, $pseudo]);
        $infosUser = $stmt->fetch();

        return $infosUser;
    }

    public function editeurChangePassword($old_password, $new_password) {
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

        return $requeteUpdateEditeurMdp->rowCount() > 0;
    }

    public function deleteAccount($user_id) {
        $deleteUserAccount = "DELETE FROM FORK_UTILISATEUR WHERE USER_ID = ?";
        $changeAuthorComm = "UPDATE FORK_COMMENTAIRE SET USER_ID = 1 WHERE USER_ID = ?";
        $changeAuthorRecette = "UPDATE FORK_RECETTE SET USER_ID = 1 WHERE USER_ID = ?";

        $requeteChangeAuthorComm = $this->connection->getConnection()->prepare($changeAuthorComm);
        $requeteChangeAuthorComm->execute([$user_id]);

        $requeteChangeAuthorRecette = $this->connection->getConnection()->prepare($changeAuthorRecette);
        $requeteChangeAuthorRecette->execute([$user_id]);

        $requeteDeleteUserAccount = $this->connection->getConnection()->prepare($deleteUserAccount);
        $requeteDeleteUserAccount->execute([$user_id]);

        return $requeteChangeAuthorComm->rowCount() > 0 && $requeteChangeAuthorRecette->rowCount() > 0 && $requeteDeleteUserAccount->rowCount() > 0;
    }

    public function banAccount($user_id) {
        $fetchUserStatus = "SELECT STA_INTITULE FROM FORK_UTILISATEUR JOIN FORK_STATUT USING(STA_ID) WHERE USER_ID = ?";

        $requete = $this->connection->getConnection()->prepare($fetchUserStatus);
        $requete->execute([$user_id]);
        $user_status = $requete->fetch();
        $user_status = $user_status['STA_INTITULE'];

        if (strtolower($user_status) === 'actif') {
            $updateUserStatus = "UPDATE FORK_UTILISATEUR SET STA_ID = 2 WHERE USER_ID = ?";
        } else {
            $updateUserStatus = "UPDATE FORK_UTILISATEUR SET STA_ID = 1 WHERE USER_ID = ?";
        }

        $requeteDeleteUserAccount = $this->connection->getConnection()->prepare($updateUserStatus);
        $requeteDeleteUserAccount->execute([$user_id]);

        return $requeteDeleteUserAccount->rowCount() > 0;
    }

    public function displayAccountData($user_id) {
        $fetchUserData = "SELECT * FROM FORK_UTILISATEUR JOIN FORK_STATUT USING(STA_ID) WHERE USER_ID = ?";

        $requete = $this->connection->getConnection()->prepare($fetchUserData);
        $requete->execute([$user_id]);

        $row = $requete->fetch();
        $compte = new Compte();
        $compte->user_id = $row['USER_ID'];
        $compte->typ_id = $row['TYP_ID'];
        $compte->sta_id = $row['STA_ID'];
        $compte->sta_intitule = $row['STA_INTITULE'];
        $compte->user_pseudo = $row['USER_PSEUDO'];
        $compte->user_email = $row['USER_EMAIL'];
        $compte->user_prenom = $row['USER_PRENOM'];
        $compte->user_nom = $row['USER_NOM'];
        $compte->user_date_ins = $row['USER_DATE_INS'];
        $compte->user_date_modif = $row['USER_DATE_MODIF'];

        return $compte;
    }

    public function displayAllUsers() {
        $fetchUsersData = "SELECT * FROM FORK_UTILISATEUR JOIN FORK_STATUT USING(STA_ID) JOIN FORK_TYPE USING(TYP_ID) WHERE lower(TYP_INTITULE) != 'administrateur';";
        $requete = $this->connection->getConnection()->query($fetchUsersData);

        $utilisateurs = [];
        while (($row = $requete->fetch())) {
            $compte = new Compte();
            $compte->user_id = $row['USER_ID'];
            $compte->typ_intitule = $row['TYP_INTITULE'];
            $compte->sta_intitule = $row['STA_INTITULE'];
            $compte->user_pseudo = $row['USER_PSEUDO'];
            $compte->user_email = $row['USER_EMAIL'];
            $compte->user_prenom = $row['USER_PRENOM'];
            $compte->user_nom = $row['USER_NOM'];
            $compte->user_date_ins = $row['USER_DATE_INS'];
            $compte->user_date_modif = $row['USER_DATE_MODIF'];

            $utilisateurs[] = $compte;
        }
        return $utilisateurs;
    }

    public function updateAccountData($input, $user_id) {
        $requeteUpdateCompte = $this->connection->getConnection()->prepare(
            "
            UPDATE FORK_UTILISATEUR SET
            USER_PSEUDO = ?,
            USER_NOM = ?,
            USER_PRENOM = ?,
            USER_EMAIL = ?,
            USER_DATE_MODIF = NOW()
            WHERE USER_ID = ?;
            "
        );
        $requeteUpdateCompte->execute([
            $input['pseudo'],
            $input['nom'],
            $input['prenom'],
            $input['email'],
            $user_id
        ]);

        return $requeteUpdateCompte->rowCount() > 0;
    }

}