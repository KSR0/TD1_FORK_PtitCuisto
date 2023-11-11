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

        $count = "SELECT COUNT(*) FROM FORK_UTILISATEUR WHERE USER_EMAIL = ? AND USER_MDP = ?";
        $stmtcount = $bdd->prepare($count);
        $stmtcount->execute([$email, $password]);
        $count = $stmtcount->fetch(PDO::FETCH_ASSOC);
        $count = $count["COUNT(*)"];

        $query = "SELECT USER_ID,USER_PSEUDO,TYP_ID FROM FORK_UTILISATEUR WHERE USER_EMAIL = ? AND USER_MDP = ?";
        

        $stmt = $bdd->prepare($query);
        $stmt->execute([$email, $password]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($count == 1){
            echo json_encode($user);
            exit();
        }
        else{
            echo json_encode(['error' => 'Identifiants incorrects']);
            exit();
        }
    }
?>