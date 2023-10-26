<div id="defaultModal" data-modal-backdrop="defaultModal" tabindex="-1" aria-hidden="true" class="lg:pl-80 modal1 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal1-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="modal1-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="modal1-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Filtre par catégorie</p>

                <div class="modal1-close cursor-pointer z-50">
                    <button onclick="activer_liens(); fond_fonce()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <form>   
                <h3 class="mb-4 font-semibold text-gray-900">Choix des catégories</h3>
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r"> 
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-license" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="horizontal-list-radio-license" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Entrée </label>
                        </div>
                    </li>

                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-id" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="horizontal-list-radio-id" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Plat</label>
                        </div>
                    </li>

                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                        <div class="flex items-center pl-3">
                            <input id="horizontal-list-radio-millitary" type="radio" value="" name="list-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 focus:ring-2">
                            <label for="horizontal-list-radio-millitary" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Dessert</label>
                        </div>
                    </li>
                </ul>
            </form>

            <div class="flex justify-end pt-2 mt-4">
                <button onclick="activer_liens(); fond_fonce()" class="modal1-close px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Fermer</button>
                <input type="submit" onclick="bouton_recherche_par_categorie()" class="cursor-pointer modal1-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">
            </div>
        </div>
    </div>
</div>