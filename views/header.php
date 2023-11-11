<?php
    // Appel des fichiers où sont rédigé le code pour afficher les modales
    require_once 'views/modale_categorie.php';
    require_once 'views/modale_titre.php';
    require_once 'views/modale_ingredients.php';
?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->

<script>
    function Openbar() {
        document.querySelector('.sidebar').classList.toggle('left-[-300px]')
    }
</script>
<script src="views/script_modales.js"></script>
 

<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->

<!-- Code pour la navbar -->
<nav class="font-permanent_marker">
    <div onclick="Openbar()" class="bouton_menu_mobile cursor-pointer absolute text-charte_blanc text-4xl top-5 left-4" >
        <i class="bi bi-filter-left px-2 bg-charte_bleu_clair rounded-md" title="Ouvrir le menu"></i>
    </div>

    <div class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] duration-1000 p-2 w-[300px] overflow-y-auto text-center bg-charte_bleu_clair shadow h-screen">

        <div class="text-gray-100 text-xl">

            <div class="p-2.5 mt-1 flex items-center rounded-md ">
                <p class="logo_menu cursor-pointer mx-auto">
                    <a href="index.php"><img class="h-20 pl-1 p-2" src="img/Logo.png" alt="Logo du site" title="Aller à l'accueil"></a>
                </p>
                <i onclick="Openbar()" class="cursor-pointer bi bi-x lg:hidden" title="Fermer le menu"></i>
            </div>

            <hr class="my-2 text-charte_blanc">

            <div>
                <div class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 bg-charte_gris border-2 border-charte_bleu_fonce">
                    <i class="bi bi-search text-sm"></i>
                    <input class="text-[15px] ml-4 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="Rechercher">
                </div>

                <hr class="my-2 mt-3 text-charte_blanc">

                <a href="index.php">
                    <div class="element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                        <i class="bi bi-house-door-fill"></i>
                        <p class="text-[15px] ml-4 text-gray-200">Accueil</p>
                    </div>
                </a>

                <a href="index.php?action=liste_recette">
                    <div class="element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                        
                        <i class="bi bi-bookmark-fill"></i>
                        <p class="text-[15px] ml-4 text-gray-200">Recettes</p>
                        
                    </div>
                </a>

                <div onclick="dropDown()" class="element_menu_deroulant cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                    <i class="bi bi-funnel-fill"></i>

                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4 text-gray-200">Filtres</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="bi bi-caret-down-fill"></i>
                        </span>
                    </div>

                </div>

                <div class="leading-7 text-left text-sm font-thin mt-2 w-4/5 mx-auto" id="submenu">

                    <hr class="my-2 mt-3 text-charte_blanc">

                    <div id="categorie" class="cursor-pointer modal-open1 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                        <i class="bi bi-book"></i>
                        <p data-modal-target="staticModal" data-modal-toggle="staticModal" class="text-[15px] ml-4 text-gray-200">Catégorie</p>
                        <script>ouvrir_modale(1)</script>
                    </div>

                    <hr class="my-2 mt-3 text-charte_blanc">

                    <div id="titre" class="cursor-pointer modal-open2 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                        <i class="bi bi-search"></i>
                        <p data-modal-target="staticModal" data-modal-toggle="staticModal" class="text-[15px] ml-4 text-gray-200">Titre</p>
                        <script>ouvrir_modale(2)</script>
                    </div>

                    <hr class="my-2 mt-3 text-charte_blanc">

                    <div id="ingredient" class="cursor-pointer modal-open3 p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce">
                        <i class="bi bi-cart"></i>
                        <p data-modal-target="staticModal" data-modal-toggle="staticModal" class="text-[15px] ml-4 text-gray-200">Ingrédient(s)</p>
                        <script>ouvrir_modale(3)</script>
                    </div>

                </div>

                <hr class="my-4 text-gray-600">

                <?php if(!isset($_SESSION['user_pseudo'])) {
                    echo "<a href='index.php?action=connexion_compte'>
                            <div class='element_menu cursor-pointer p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 border-2 border-charte_blanc bg-charte_bleu_clair hover:bg-charte_bleu_fonce'>
                                <i class='bi bi-box-arrow-in-right'></i>
                                <p class='modal-open2 text-[15px] ml-4 text-gray-200'>Se connecter</p>
                            </div>
                        </a>";
                    }
                ?>

                <?php if(isset($_SESSION['user_pseudo'])) {
                    echo "<a href='index.php?action=edito&deconnexion=true'>
                    <div class='element_menu cursor-pointer p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 border-2 border-charte_blanc bg-charte_bleu_clair hover:bg-charte_bleu_fonce'>
                        <i class='bi bi-box-arrow-in-right'></i>
                        <p class='modal-open2 text-[15px] ml-4 text-gray-200'>Se deconnecter</p>
                    </div>
                    </a>";
                }
                ?>

                <hr class="my-4 text-gray-600">

                <?php 
                if(isset($_SESSION['user_pseudo']) && strtoupper($_SESSION['user_pseudo']) == "ADMIN") {
                        echo "
                            <a href='index.php?action=pannel'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-person-lines-fill'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Panneau Admin</p>
                                </div>
                            </a>";

                        echo "
                            <a href='index.php?action=creation_recette'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-egg-fried'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Creer recette</p>
                                </div>
                            </a>";
                }
                else {;
                }
                ?>

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
    onclick="bouton_creation_compte()">Création d'un compte</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_mon_compte()">Mon compte</button>

    <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" 
    onclick="bouton_modification_compte()">Modifier mon compte</button>

    <?php
    if (isset($_SESSION['user_pseudo'])) {
        echo "<p class='text-3xl text-center text-charte_bleu_clair'>Connecté en tant que : ".$_SESSION['user_pseudo']."</p>";
    }
    else {
        echo "<p class='text-3xl text-center text-charte_bleu_clair'>Non connecté</p>";
    }
    ?>

</div>