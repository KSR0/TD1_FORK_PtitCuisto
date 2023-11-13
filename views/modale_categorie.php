<div id="staticModal" data-modal-backdrop="static" aria-hidden="true" class="font-pacifico z-20 modal1 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="marge modal1-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="marge modal1-container bg-white w-auto mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="marge modal1-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <h1 class="text-charte_bleu_fonce font-permanent_marker pr-3 pb-3 text-4xl font-bold text-center leading-tight">Recherche par catégorie</h1>

                <div class="modal1-close cursor-pointer z-50">
                    <button>
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <h3 class="text-charte_bleu_clair block pb-2 text-2xl font-medium">Choisissez une catégorie :</h3>

            <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r"> 
                <a href="index.php?action=liste_recette&type_plat=entree">
                    <div class="bg-charte_gris border-2 border-charte_bleu_fonce flex items-center pl-3">
                        <p class="w-full text-center py-3 -ml-2 text-xl text-charte_blanc">Entrée</p>
                    </div>
                </a>
                </li>

                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                <a href="index.php?action=liste_recette&type_plat=plat">
                    <div class="bg-charte_gris border-2 border-charte_bleu_fonce flex items-center pl-3">
                    <p class="w-full text-center py-3 -ml-2 text-xl text-charte_blanc">Plat</p>
                    </div>
                </a>
                </li>

                <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                <a href="index.php?action=liste_recette&type_plat=dessert">
                    <div class="bg-charte_gris border-2 border-charte_bleu_fonce flex items-center pl-3">
                    <p class="w-full text-center py-3 -ml-2 text-xl text-charte_blanc">Dessert</p>
                    </div>
                </a>
                </li>
            </ul>
        </div>
    </div>
</div>