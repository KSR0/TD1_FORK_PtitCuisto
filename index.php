<?php session_start(); // Démarrez la session

    if (!isset($_SESSION['visited'])) {
        $_SESSION['visited'] = true;
        $content = file_get_contents('view/page/edito.php');
    } else {
        $content = ''; // Initialisez la variable content selon vos besoins
    }	

    require_once 'view/template.php';
?>