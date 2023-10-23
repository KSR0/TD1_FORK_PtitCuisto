<?php
    // Appel du fichier où sont rédigées les requêtes SQL sous forme de fonctions
    require_once '../../model/base/requetes_header.php';
?>

<script src="../../controller/base/script_header.js"></script>


<!-- Code pour la navbar -->
<nav class="font-permanent_marker">
    <span class="absolute text-charte_blanc text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
        <i class="bi bi-filter-left px-2 bg-charte_bleu_clair rounded-md" title="Ouvrir le menu"></i>
    </span>

    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 p-2 w-[300px] overflow-y-auto text-center bg-charte_bleu_clair shadow h-screen">

        <div class="text-gray-100 text-xl">

            <div class="p-2.5 mt-1 flex items-center rounded-md ">
                <a class="mx-auto" href="edito.php">
                    <img class="h-20 pl-1 p-2 cursor-pointer" src="../../img/Logo.png" alt="Logo du site" title="Aller à l'accueil">
                </a>
                <i class="bi bi-x cursor-pointer lg:hidden" title="Fermer le menu" onclick="Openbar()"></i>
            </div>

            <hr class="my-2 text-charte_blanc">

            <div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-charte_gris border-2 border-charte_bleu_fonce">
                    <i class="bi bi-search text-sm"></i>
                    <input class="text-[15px] ml-4 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="Rechercher">
                </div>

                <hr class="my-2 mt-3 text-charte_blanc">

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                    <i class="bi bi-house-door-fill"></i>
                    <span class="text-[15px] ml-4 text-gray-200">
                        <a href="edito.php">Accueil</a>
                    </span>
                </div>

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                    <i class="bi bi-bookmark-fill"></i>
                    <span class="text-[15px] ml-4 text-gray-200">
                        <a href="recette.php">Recettes</a>
                    </span>
                </div>

                <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                    <i class="bi bi-funnel-fill"></i></i>

                    <div class="flex justify-between w-full items-center" onclick="dropDown()">
                        <span class="text-[15px] ml-4 text-gray-200">Filtres</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-caret-down-fill"></i>
                        </span>
                    </div>

                </div>

                <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu">

                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                        <i class="bi bi-book"></i>
                        <span class="text-[15px] ml-4 text-gray-200">Catégorie</span>
                    </div>

                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                        <i class="bi bi-search"></i>
                        <span class="text-[15px] ml-4 text-gray-200">Titre</span>
                    </div>

                    <div class="p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-charte_bleu_fonce">
                        <i class="bi bi-cart"></i>
                        <span class="text-[15px] ml-4 text-gray-200">Ingrédient(s)</span>
                    </div>

                </div>

                <hr class="my-4 text-gray-600">

                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer border-2 bg-charte_bleu_fonce">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span class="text-[15px] ml-4 text-gray-200">
                        <a href="connexion_creation_compte.php">Se connecter</a>
                    </span>
                </div>
                
            </div>
        </div>
    </div>
</nav>

<script>
    function dropDown() {
        document.querySelector('#submenu').classList.toggle('hidden')
        document.querySelector('#arrow').classList.toggle('rotate-0')
    }
    dropDown()

    function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    }
</script>


<!-- Permet de passer d'une page à une autre facilement pour faire des tests sans passer par le menu -->
<div class="text-center lg:pl-80 lg:pt-5 min-[320px]:pt-20 md:pt-20 pr-5 pt-5">

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_detail_recette()">Détails de la recette</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_creation_recette()">Création d'une recette</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_modification_recette()">Modifier ma recette</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_mon_compte()">Mon compte</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_modification_compte()">Modifier mon compte</button>

</div>