<script src="../../controller/base/script_header.js"></script>

<header>

    <!-- Navbar -->
    <nav class="bg-charte_bleu_clair border-charte_gris font-permanent_marker mb-5">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="edito.php" class="flex items-center">
                <img class="object-scale-down h-8 mr-3" src="../../img/Logo.png" alt="Logo du site" title="Aller à l'acceuil">
            </a>

            <div class="flex items-center md:order-2">
                <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full" src="../../img/user_account.png" alt="Photo de profil de l'utilisateur">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">Utilisateur1</span>
                        <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">utilisateur1@test.fr</span>
                    </div>

                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Modifier mon compte</a>
                        </li>

                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            Se déconnecter</a>
                        </li>
                    </ul>
                </div>

                <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="edito.php" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500" aria-current="page">
                        Accueil</a>
                    </li>

                    <li>
                        <a href="recette.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Recettes</a>
                    </li>
                    <li>
                        <a href="filtre.php" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                        Filtres</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Permet de passer d'une page à une autre facilement pour faire des tests sans passer par le menu -->
    <div class="text-center mb-4">
    
        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_edito()">Edito</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_recette()">Recettes</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_detail_recette()">Détails Recette</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_creation_recette()">Création Recette</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_modification_recette()">Modification Recette</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_filtre()">Filtres</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_connexion_creation_compte()">Se connecter</button>

        <button class="ml-5 text-charte_bleu_clair hover:text-charte_bleu_fonce border border-charte_bleu_fonce hover:bg-charte_bleu_clair focus:ring-4 focus:outline-none  font-medium rounded-lg text-xl px-5 py-2.5 text-center mr-2 mb-2" 
        onclick="bouton_modification_compte()">Modifier son compte</button>

    </div>
</header>