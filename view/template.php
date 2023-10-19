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

    <body> <!-- class="font-pacifico text-2xl m-1" -->
	    <?php 
		    require_once('view/base/header.php');
	    ?>

	    <?= $content ?>

	    <?php 
	        require_once('view/base/footer.php');
	    ?>
    </body>
</html>