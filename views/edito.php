<?php ob_start();?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Site du P'tit Cuisto !</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Édito - Accueil.</p>
<img class="mx-auto object-scale-down h-72 w-144 mt-5" src="img/Edito.png" alt="Image de présentation de l'édito" title="Edito !">


<?php $content = ob_get_clean();?>

<?php require_once('template.php'); ?>