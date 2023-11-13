<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>P'tit Cuisto</title>

        <link rel="stylesheet" href="tailwind/tailwind.css">
        <link rel="icon" type="image/x-icon" href="img/Edito.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">


        <script src="https://code.jquery.com/jquery-latest.js"></script>

    </head>

    <body>
        <header>
            <?php 
                require_once('header.php');
            ?>
        </header>

        <main class="lg:pl-80 min-[320px]:pl-5 md:pl-5 pr-5 pt-5 font-pacifico text-2xl">
            <?= $content?>
        </main>
            
        <footer class="lg:pl-80 w-full sticky bottom-0">
            <?php 
                require_once('footer.php');
	        ?>
        </footer>
    </body>

</html>