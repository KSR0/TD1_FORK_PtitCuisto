<?php
    require_once '../../../includes/connexionBDD.php';
    require_once '../../../model/base/requetes_modale_ingredients.php';
?>

<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="lg:pl-80 modal3 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div id="modal3-test" class="modal3-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="modal3-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
  
        <div class="modal3-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Filtre par Ingredients</p>

                <div class="modal3-close cursor-pointer z-50">
                    <button onclick="activer_sous_menu(); activer_sous_menu_deroulant(); activer_bouton_mobile(); activer_logo_menu(); fond_fonce(); fond_fonce_deroulant()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <form action="filtre_ingredients.php" method="post">
                <h3 class="mb-4 font-semibold text-gray-900">Choix des ingrédients</h3>

                <select id="ingredients" name="selection_ingredient" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="selection_base">--Choisissez un ingrédient--</option>
                    <?php
                        $ingredients = recupIngredients($bdd);
                        foreach ($ingredients as $ingredient) {
                            echo "<option value='$ingredient'>$ingredient</option>";
                        }
                    ?> 
                </select>


                <div class="flex justify-end pt-2 mt-4">
                    <button type="submit" name="submit" id="rechercher" class="cursor-pointer modal3-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400"> Rechercher </button>
                </div>
            </form>
        </div>
    </div>
</div>