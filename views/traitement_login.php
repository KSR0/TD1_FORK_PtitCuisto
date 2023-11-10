<?php

    $db_host = parse_ini_file('../all_secret_variables.env')["DB_HOST"];
    $db_name = parse_ini_file('../all_secret_variables.env')["DB_NAME"];
    $db_encode = parse_ini_file('../all_secret_variables.env')["DB_ENCODE"];
    $db_username = parse_ini_file('../all_secret_variables.env')["DB_USERNAME"];
    $db_password = parse_ini_file('../all_secret_variables.env')["DB_PASSWORD"];

    $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT USER_ID,USER_PSEUDO FROM FORK_UTILISATEUR WHERE USER_EMAIL = ? AND USER_MDP = ?";
        

        $stmt = $bdd->prepare($query);
        $stmt->execute([$email, $password]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo json_encode($user);
            exit();
        } else {
            echo json_encode(['error' => 'Identifiants incorrects']);
            exit();
        }
    }
?>