<div id="staticModal" data-modal-backdrop="static" aria-hidden="true" class="font-pacifico z-20 modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="marge modal2-overlay absolute w-full h-full opacity-50"></div>                                
    <div class="marge modal2-container bg-white w-auto mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="marge modal2-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <h1 class="text-charte_bleu_fonce font-permanent_marker pr-3 pb-3 text-4xl font-bold text-center leading-tight">Recherche par titre</h1>
                
                <div class="modal1-close cursor-pointer z-50">
                    <button>
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <div class="relative">
                <input type="text" id="recette" name="recette" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Saisissiez un titre" required>
                <a id="lien_recette_titre" href="index.php?action=liste_recette&titre=">
                    <button type="submit" name="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
                </a>
            </div><br>
            <div id="resultat">
            </div>
            <script>

                $(document).ready(function () {

                    $("#recette").keyup(function () {
                        let saisie = $(this).val();
                        if (saisie.length >= 1) {
                            $.ajax({
                                url: "views/sugg.php?saisie=" + saisie,
                                method: "GET",
                                success: function (data) {
                                    $("#resultat").html(data);
                                }
                            });
                        }
                        else {
                            $("#resultat").empty();
                        }

                        $("#resultat").on("change", "#resultat_texte", function () {
                            let selectedValue = $(this).val();
                            let link = "index.php?action=liste_recette&titre=" + selectedValue;
                            $("#lien_recette_titre").attr("href", link);
                        });
                }); 
            });
            </script>
        </div>
    </div>
</div>