<?php
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    require_once 'requetes_BDD/requetes.php';
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>P'tit Cuisto</title>
        <link rel="stylesheet" href="tailwind/tailwind.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    </head>

    <body class="font-pacifico text-2xl m-1">

        <img class="object-scale-down w-64 m-5" src="img/Logo.png" alt="Logo du site" title="Logo P'tit Cuito !">
        <h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">PHP - Site du P'tit Cuisto !</h1>
        <p class="text-3xl text-center text-charte_bleu_clair">Ceci est un test</p>
        <img class="mx-auto object-scale-down h-72 w-144 mt-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">

        <?php
            // Appel de la fonction de la requête SQL permettant d'afficher les utilisateurs
            afficherUtilisateurs($bdd);
        ?>
