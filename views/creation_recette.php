<?php ob_start(); ?>

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Création d'une recette</h1>

<form action="index.php?action=requete_creation_recette" method="post">
    <div id="recette">
        <div class='border-2 border-charte_bleu_clair h-fit rounded-lg pt-2 px-4 mb-2 mr-2'>
            <div class='flex'>

                <div id='tag_image' class='w-1/2 max-h-div_recette text-center p-4 mr-2'>
                    <div class='text-charte_bleu_fonce'>
                        <label for='lien_image' class='font-permanent_marker text-3xl' for='lien_image'>Entrez le lien de l'image : </label><br>
                        <div class="my-2">
                            <textarea type='lien_image' name='lien_image' id='lien_image' class="text-charte_bleu_clair border border-charte_bleu_fonce rounded-lg p-2 w-full" type="text" id="lien_image" name="lien_image" placeholder="Exemple : https://le_lien_de_l_image_de_la_recette" required=""></textarea><br>
                        </div>
                    </div>

                    <div class='text-center text-charte_blanc border-2 border-charte_bleu_clair rounded-lg bg-charte_bleu_clair p-2 mb-2'>
                        <label for='tags' class='font-permanent_marker text-3xl' for="tags">Entrez les tags (separés par une virgule) : </label>
                        <div class="my-2">
                            <textarea type='tags' name='tags' id='tags' class="text-charte_bleu_clair border border-charte_bleu_fonce rounded-lg p-2 w-full" type="text" id="tags" name="tags" placeholder="Exemple : #Noel, #Hiver" required=""></textarea>
                        </div>
                    </div>
                </div>

                <div id='div_infos' class='text-charte_bleu_fonce border-l-2 border-charte_bleu_fonce w-1/2 py-2 px-4'>
                    <label for='titre' class="font-permanent_marker text-3xl" for="titre">Entrez le titre de votre recette: </label><br>
                    <div class="my-2">
                        <input type='titre' name='titre' id='titre' class="text-charte_bleu_clair border border-charte_bleu_fonce rounded-lg p-2 w-full" type="text" id="titre" name="titre" placeholder="Exemple : Tarte aux pommes" required=""/><br><br>
                    </div>

                    <label for='categorie' class="font-permanent_marker text-3xl" for="categorie">Sélectionnez la catégorie de la recette : </label>
                    <div class="my-2">
                        <select type='categorie' name='categorie' id='categorie' class="text-charte_bleu_clair cursor-pointer border border-charte_bleu_fonce rounded-lg p-2 " name="categorie" id="categorie-select">
                            <option class="text-charte_gris" value="">-- Choisissez une catégorie --</option>
                            <option class="text-charte_bleu_clair" value="Entrée">Entrée</option>
                            <option class="text-charte_bleu_clair" value="Plat">Plat</option>
                            <option class="text-charte_bleu_clair" value="Dessert">Dessert</option>
                        </select>
                    </div>
                </div>
            </div>

            <hr class='border-2 border-charte_bleu_fonce my-4 mx-auto'>

            <div class='flex'>
                <div id='div_resume' class='w-1/2 text-charte_bleu_fonce py-2 px-4'>
                    <label for='resume' class="font-permanent_marker text-3xl" for="resume">Entrez le résumé de la recette : </label><br>
                    <div class="my-2">
                        <textarea type='resume' name='resume' id='resume' class="text-charte_bleu_clair border border-charte_bleu_fonce rounded-lg p-2 w-full" id="resume" name="resume" placeholder="Exemple : Cette version de la tarte aux pommes est une spécialité normande..." required=""></textarea>
                    </div>
                </div>

                <div class='w-1/2 border-l-2 border-charte_bleu_fonce mb-2'>
                    <div id='div_contenu' class='text-charte_bleu_fonce pt-2 px-4'> 
                        <label for='contenu' class="font-permanent_marker text-3xl" for="contenu">Entrez le contenu de la recette : </label><br>
                        <div class="my-2">
                            <textarea type='contenu' name='contenu' id='contenu' class="text-charte_bleu_clair border border-charte_bleu_fonce rounded-lg p-2 w-full" id="contenu" name="contenu" placeholder="Exemple : Matériel : moule, couteau, four..." required=""></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='error' class='text-center'></div>

    <button class="font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce">
        <p type="submit">Créer une recette</p>
    </button>
</form>

<?php $content = ob_get_clean();
require_once('template.php')?>
