<?php

    $db_host = parse_ini_file('../all_secret_variables.env')["DB_HOST"];
    $db_name = parse_ini_file('../all_secret_variables.env')["DB_NAME"];
    $db_encode = parse_ini_file('../all_secret_variables.env')["DB_ENCODE"];
    $db_username = parse_ini_file('../all_secret_variables.env')["DB_USERNAME"];
    $db_password = parse_ini_file('../all_secret_variables.env')["DB_PASSWORD"];

    $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];

        $querymaxid = "SELECT MAX(USER_ID)+1 FROM FORK_UTILISATEUR";
        $stmtmaxid = $bdd->prepare($querymaxid);
        $stmtmaxid->execute();
        $maxid = $stmtmaxid->fetch(PDO::FETCH_ASSOC);
        $maxid = $maxid["MAX(USER_ID)+1"];

        $query = "INSERT INTO FORK_UTILISATEUR (USER_ID, TYP_ID, STA_ID, USER_EMAIL, USER_MDP, USER_NOM, USER_PRENOM, USER_PSEUDO, USER_DATE_INS, USER_DATE_MODF) VALUES (?, 3, 1, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        

        $stmt = $bdd->prepare($query);
        $stmt->execute([$maxid,$email, $password, $nom, $prenom, $pseudo]);
    }
?>