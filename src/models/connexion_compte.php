<?php


class ConnexionCompte {
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

class ConnexionCompteRepository {
    public DatabaseConnection $connection;


    public function userSignIn($email, $password) {
        $password = hash('sha512', $password);


        $query = "SELECT USER_ID,USER_PSEUDO,TYP_ID, COUNT(*) as nb FROM FORK_UTILISATEUR WHERE USER_EMAIL = ? AND USER_MDP = ?";
        

        $requeteConnexionCompte = $this->connection->getConnection()->prepare($query);
        $requeteConnexionCompte->execute([$email, $password]);
        
        $infosUser = $requeteConnexionCompte->fetch();

        return $infosUser;
    }





}