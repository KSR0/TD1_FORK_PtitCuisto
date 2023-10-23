<script src="../../controller/base/script_header.js"></script>

<header class="bg-white">
    <nav class="text-charte_bleu_fonce font-permanent_marker flex justify-between items-center w-[92%]  mx-auto">

        <div>
            <img class="h-14 pl-1 p-2 cursor-pointer" src="../../img/Logo.png" alt="...">
        </div>

        <div
            class="nav-links duration-500 sm:static absolute bg-white sm:min-h-fit min-h-[30vh] left-0 top-[-100%] sm:w-auto  w-full flex items-center px-5">
            <ul class="flex sm:flex-row flex-col sm:items-center sm:gap-[4vw] gap-8">
                <li>
                    <a class="hover:text-gray-500" href="#">Accueil</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Recettes</a>
                </li>
                <li>
                    <a class="hover:text-gray-500" href="#">Filtres</a>
                </li>
            </ul>
        </div>

        <div class="flex items-center gap-1 sm:gap-6">
            <button class="bg-[#a6c1ee] text-white px-5 py-2 rounded-full hover:bg-[#87acec]">Se connecter</button>
            <ion-icon onclick="menu_deroulant(this)" name="menu" class="text-3xl cursor-pointer sm:hidden"></ion-icon>
        </div>
    </nav>
</header>

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