<?php 
        $db_host = parse_ini_file('all_secret_variables.env')["DB_HOST"];
        $db_name = parse_ini_file('all_secret_variables.env')["DB_NAME"];
        $db_encode = parse_ini_file('all_secret_variables.env')["DB_ENCODE"];
        $db_username = parse_ini_file('all_secret_variables.env')["DB_USERNAME"];
        $db_password = parse_ini_file('all_secret_variables.env')["DB_PASSWORD"];

        $bdd = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=' . $db_encode, $db_username, $db_password);
?>

<div id="staticModal" data-modal-backdrop="static" aria-hidden="true" class="font-pacifico z-20 modal3 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="marge modal3-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>                                
    <div class="marge modal3-container bg-white w-auto mx-auto rounded shadow-lg z-50 overflow-y-auto">
        
        <div class="marge modal3-content py-4 text-left px-6">
            
            <div class="flex justify-between items-center pb-3">
                <h1 class="text-charte_bleu_fonce font-permanent_marker pr-3 pb-3 text-4xl font-bold text-center leading-tight">Recherche par ingrédient(s)</h1>
                
                <div class="modal3-close cursor-pointer z-50">
                    <button>
                        <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            
            <div class="relative">

                <select id="ingredients" name="ingredients[]" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" multiple>
                    <option value="">Sélectionnez un ingrédient</option>
                    <?php  
                        $requete = "SELECT ING_INTITULE FROM FORK_INGREDIENT";
                        $stmt = $bdd->prepare($requete);
                        $stmt->execute();
                        $resultats = $stmt->fetchAll();
                        foreach($resultats as $resultat) {
                            echo '<option value="'.$resultat['ING_INTITULE'].'">'.$resultat['ING_INTITULE'].'</option>';
                        }  
                    ?>
                </select><br>

                <div id="selectedIngredients"></div><br>

                <div class="mb-3">
                    <a id="lien_recette_ing" href="index.php?action=liste_recette&ingredients=">
                        <button type="submit" name="submit" class="text-white absolute right-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Rechercher</button>
                    </a>
                </div>

  
            </div><br>

            <script>
                $(document).ready(function () {
                    $("#ingredients").change(function () {
                        console.log("Changement détecté");
                        let selectedValue = $(this).val();
                        console.log("Valeur sélectionnée : " + selectedValue);
                        let link = "index.php?action=liste_recette&ingredients=" + selectedValue;
                        console.log("Nouveau lien : " + link);
                        $("#lien_recette_ing").attr("href", link);
                    });
                });

                let selectedIngredientsArray = [];

                document.getElementById('ingredients').addEventListener('change', function() {
                    let selectedOptions = Array.from(this.selectedOptions).map(function(option) {
                        return option.text;
                    });
                    
                    selectedIngredientsArray = Array.from(this.selectedOptions).map(function(option) {
                        return option.value;
                    });

                    let selectedIngredientsDiv = document.getElementById('selectedIngredients');
                    selectedIngredientsDiv.innerHTML = '<p>Ingrédients sélectionnés : ' + selectedOptions.join(', ') + '</p>';
                });
            </script>
        </div>
    </div>
</div>