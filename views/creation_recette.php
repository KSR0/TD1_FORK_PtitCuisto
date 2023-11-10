<?php ob_start();?>



<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class="text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5">Crée une recette</h1>
<p class="text-3xl text-center text-charte_bleu_clair">Remplissez le formulaire ci-dessous pour crée votre propre recette.</p><br>

<form action="index.php?action=requete_creation_recette" method="post">

    <div>
        <label for="pseudo">Votre pseudo : </label>
        <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" />
   </div>

   <div>
  	<label for="titre">Titre de la recette : </label>
  	<input type="text" id="titre" name="titre" placeholder="Titre" />
   </div>

   <div>
        <label for="categorie">Categorie de la recette : </label>
        <select name="categorie" id="categorie-select">
            <option value="">-- Choisir une categorie de plat --</option>
            <option value="entree">Entrée</option>
            <option value="plat">Plat</option>
            <option value="dessert">Dessert</option>
        </select>
    </div>

   <div>
  	<label for="contenu">Contenu de la recette : </label>
  	<textarea id="contenu" name="contenu" placeholder="Contenu"></textarea>
   </div>

   <div>
  	<label for="resume">Resume de la recette : </label>
  	<input type="text" id="resume" name="resume" placeholder="Resume"></input>
   </div>

   <div>
  	<label for="tags">Tags de la recette (separés par une virgule) : </label>
  	<input class="w-3/5" type="text" id="tags" name="tags" placeholder="Ex : Noel, Hiver"></input>
   </div>



   <div>
  	<label for="lien_image">Lien de l'image de la recette : </label>
  	<input type="text" id="lien_image" name="lien_image" placeholder="https://..."></input>
   </div>

   <br>
   <div>
  	<input type="submit" class="text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-lg px-5 py-2.5 text-center mr-2 mb-2"/>
   </div>
</form>

<?php $content = ob_get_clean();
require_once('template.php');
?>

