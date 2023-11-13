<div id="staticModal" data-modal-backdrop="static" aria-hidden="true" class="font-pacifico z-20 modal2 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="marge modal2-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="marge modal2-container bg-white w-auto mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="marge modal2-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <h1 class="text-charte_bleu_fonce font-permanent_marker pr-3 pb-3 text-4xl font-bold text-center leading-tight">Recherche par titre</h1>
                
                <div class="modal2-close cursor-pointer z-50">
                    <button>
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <div class="relative p-2 flex items-center rounded-md px-4 duration-300 text-charte_bleu_clair border-2 border-charte_bleu_fonce">
                <i class="bi bi-search text-sm"></i>
                <input type="text" id="recette" name="recette" class="text-xl h-fit ml-2 w-full bg-transparent focus:outline-none placeholder:text-charte_blanc" placeholder="Entrez votre recette" required>
                <a id="lien_recette_titre" href="index.php?action=liste_recette&titre=">
                    <button id="btnRechercher" disabled class="font-permanent_marker cursor-not-allowed p-1.5 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_blalnc text-charte_blanc mx-auto bg-charte_bleu_clair hover:bg-charte_bleu_fonce">
                        <p type="submit">Rechercher</p>
                    </button>
                </a>
            </div>

            <div id="messageErreur" class="mt-2"></div>

            <div id="resultat" class='bg-charte_gris border-2 border-charte_bleu_fonce mt-2 rounded-md'>
                <p class="text-charte_bleu_fonce text-center p-2 text-xl">Écrivez un nom de recette pour apparaître les choix.</p>
            </div>

            
            <script>
                $(document).ready(function () {

                    $("#recette").keyup(function () {
                        let saisie = $(this).val();
                        let btnRechercher = $("#btnRechercher");

                        if (saisie.length >= 1) {

                            $.ajax({
                                url: "views/sugg.php?saisie=" + saisie,
                                method: "GET",
                                success: function (data) {
                                    $("#resultat").html(data);
                                }
                            });
                        } else {
                            // Désactiver le bouton et restaurer le curseur
                            btnRechercher.prop("disabled", true).removeClass("cursor-pointer").addClass("cursor-not-allowed");
                            $("#resultat").empty();
                        }
                    });

                    $("#resultat").on("change", "#resultat_texte", function () {
                        let selectedValue = $(this).val();
                        let btnRechercher = $("#btnRechercher");
                        let link = "index.php?action=liste_recette&titre=" + selectedValue;

                        if (selectedValue) {
                            // Activer le bouton et changer le curseur
                            btnRechercher.prop("disabled", false).removeClass("cursor-not-allowed").addClass("cursor-pointer");
                            $("#lien_recette_titre").attr("href", link);
                        } else {
                            // Désactiver le bouton et restaurer le curseur
                            btnRechercher.prop("disabled", true).removeClass("cursor-pointer").addClass("cursor-not-allowed");
                        }
                    });
                });
            </script>
        </div>
    </div>
</div>