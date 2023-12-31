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

                <hr class="my-2 mt-3 text-charte_blanc"> 

                <?php 
                    if(isset($_SESSION['typ_id'])) {
                        if($_SESSION['typ_id'] == 1) {
                            echo "
                            <a href='index.php?action=creation_recette'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-egg-fried'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Créer une recette</p>
                                </div>
                            </a>";

                            echo "
                            <a href='index.php?action=gestion_recette'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-gear-fill'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Gérer mes recettes</p>
                                </div>
                            </a>";

                            echo "
                            <hr class='my-2 mt-3 text-charte_blanc'>
                            <a href='index.php?action=pannel'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-person-lines-fill'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Panneau Admin</p>
                                </div>
                            </a>";
                        }

                        if($_SESSION['typ_id'] == 2) {
                            echo "
                            <a href='index.php?action=creation_recette'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                    <i class='bi bi-egg-fried'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Créer une recette</p>
                                </div>
                            </a>";

                            echo "
                            <a href='index.php?action=gestion_recette'>
                                <div class='element_menu cursor-pointer p-2.5 mt-2 flex items-center rounded-md px-4 duration-300 hover:bg-charte_bleu_fonce'>
                                <i class='bi bi-gear-fill'></i>
                                    <p class='text-[15px] ml-4 text-gray-200'>Gérer mes recettes</p>
                                </div>
                            </a>";
                            
                        }
                    }
                    ?>

                     
                    <?php if(!isset($_SESSION['user_id'])) {
                    if (!(isset($_GET['action']) && $_GET['action'] === 'connexion_compte')) {
                        echo "
                        <a href='index.php?action=connexion_compte'>
                            <div class='element_menu cursor-pointer p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 border-2 border-charte_blanc bg-charte_bleu_clair hover:bg-charte_bleu_fonce'>
                                <i class='bi bi-box-arrow-in-right'></i>
                                <p class='text-[15px] ml-4 text-gray-200'>Se connecter</p>
                            </div>
                        </a>";
                    }
                }
                ?>

                <?php if(isset($_SESSION['user_id'])) {
                    echo "
                    <hr class='my-2 mt-3 text-charte_blanc'>
                    <a href='index.php?action=mon_compte'>
                        <div class='element_menu cursor-pointer p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce bg-charte_bleu_clair hover:border-charte_blanc hover:bg-charte_bleu_fonce'>
                            <i class='bi bi-person-circle'></i>
                            <p class='text-[15px] ml-4 text-gray-200'>Mon compte : " . $_SESSION['user_pseudo'] . "</p>
                        </div>
                    </a>";
                    echo "
                    <a href='index.php?action=edito&deconnexion=true'>
                        <div class='element_menu cursor-pointer p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 border-2 border-charte_blanc bg-charte_bleu_clair hover:bg-charte_bleu_fonce'>
                            <i class='bi bi-box-arrow-in-right'></i>
                            <p class='text-[15px] ml-4 text-gray-200'>Se deconnecter</p>
                        </div>
                    </a>";
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
