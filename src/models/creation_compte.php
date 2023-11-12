<?php


class CreationCompte {
    public string $user_pseudo;
    public string $user_nom;
    public string $user_prenom;
    public string $user_email;
    public string $user_mdp;
}

class CreationCompteRepository {
    public DatabaseConnection $connection;


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


        $query = "INSERT INTO FORK_UTILISATEUR (USER_ID, TYP_ID, STA_ID, USER_EMAIL, USER_MDP, USER_NOM, USER_PRENOM, USER_PSEUDO, USER_DATE_INS, USER_DATE_MODF) VALUES (?, 3, 1, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
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
        
        $stmt->execute([$maxid,$email, $passwordhash, $nom, $prenom, $pseudo]);
        $infosUser = $stmt->fetch();

        return $infosUser;
    }
    
}