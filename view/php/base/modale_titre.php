<?php
    require_once "../../../model/base/requetes_modale_titre.php";
?>

<div id="staticModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="lg:pl-80 modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div id="modal2-test" class="modal2-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="modal2-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="modal2-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <p class="text-2xl font-bold">Filtre par titre</p>
                
                <div class="modal2-close cursor-pointer z-50">
                    <button onclick="activer_sous_menu(); activer_sous_menu_deroulant(); activer_bouton_mobile(); activer_logo_menu(); fond_fonce(); fond_fonce_deroulant()">
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <form action="filtre_titre.php" method="post">
                <div class="relative">

                    <input type="text" id="recette" name="recette" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Saisissiez un titre" required>
                    <button type="submit" name="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
                </div><br>
                <select id="resultat_texte" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></select>
            </form>
                <script>
                    $("#recette").keyup(function () {
                        let saisie = $(this).val();
                        if (saisie.length >= 3) {
                            $.ajax({
                                url: "../base/sugg.php?saisie=" + saisie,
                                method: "GET",
                                success: function (data) {
                                    $("#resultat_texte").html(data);
                                }
                            });
                        }
                    }); 
                </script>
        </div>
    </div>
</div>