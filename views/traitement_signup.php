<?php

    $db_host = parse_ini_file('../all_secret_variables.env')["DB_HOST"];
    $db_name = parse_ini_file('../all_secret_variables.env')["DB_NAME"];
    $db_encode = parse_ini_file('../all_secret_variables.env')["DB_ENCODE"];
    $db_username = parse_ini_file('../all_secret_variables.env')["DB_USERNAME"];
    $db_password = parse_ini_file('../all_secret_variables.env')["DB_PASSWORD"];

    $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = hash('sha512', $_POST['password']);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];

        $querymaxid = "SELECT MAX(USER_ID)+1 FROM FORK_UTILISATEUR";
        $stmtmaxid = $bdd->prepare($querymaxid);
        $stmtmaxid->execute();
        $maxid = $stmtmaxid->fetch(PDO::FETCH_ASSOC);
        $maxid = $maxid["MAX(USER_ID)+1"];

        $queryemailexistante = "SELECT COUNT(*) FROM FORK_UTILISATEUR WHERE USER_EMAIL = ?";
        $stmtemailexistante = $bdd->prepare($queryemailexistante);
        $stmtemailexistante->execute([$email]);
        $emailexiste = $stmtemailexistante->fetch(PDO::FETCH_ASSOC);
        $emailexiste = $emailexiste["COUNT(*)"];

        $querypseudoexistant = "SELECT COUNT(*) FROM FORK_UTILISATEUR WHERE USER_PSEUDO = ?";
        $stmtpseudoexistant = $bdd->prepare($querypseudoexistant);
        $stmtpseudoexistant->execute([$pseudo]);
        $pseudoexiste = $stmtpseudoexistant->fetch(PDO::FETCH_ASSOC);
        $pseudoexiste = $pseudoexiste["COUNT(*)"];


        $query = "INSERT INTO FORK_UTILISATEUR (USER_ID, TYP_ID, STA_ID, USER_EMAIL, USER_MDP, USER_NOM, USER_PRENOM, USER_PSEUDO, USER_DATE_INS, USER_DATE_MODF) VALUES (?, 3, 1, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
        $stmt = $bdd->prepare($query);

        if(strtoupper($pseudo) == "ADMIN") {
            echo json_encode(['error' => 'Pseudo non disponible']);
            exit();
        }
        else if($pseudoexiste == 1) {
            echo json_encode(['error' => 'Pseudo non disponible']);
            exit();
        }
        else if($emailexiste == 1) {
            echo json_encode(['error' => 'Email déjà utilisé']);
            exit();
        }
        else {
            $stmt->execute([$maxid,$email, $password, $nom, $prenom, $pseudo]);
            echo json_encode(['success' => 'Compte créé avec succès']);
            exit();
        }
    }
?>