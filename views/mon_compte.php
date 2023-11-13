<?php ob_start();?>

<!-- Appel des fichiers où sont rédigées les fonctions JS -->


<!-- ↓----------------------------------------------------↓ Code de la page ↓----------------------------------------------------↓ -->
<?php
    echo "
        <h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Mon compte</h1>

            <div class='flex flex-col items-center justify-center px-6 py-2 mx-auto lg:py-0'>

                <div class='w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0'>

                    <div class='border-2 border-charte_bleu_fonce rounded-lg p-2 space-y-4 md:space-y-6 sm:p-8'>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Status du compte :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-check-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->sta_intitule . "</p>
                                </div>

                            </div>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Pseudo :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-rolodex'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_pseudo . "</p>
                                </div>

                            </div>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Nom :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_nom . "</p>
                                </div>
                            </div>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Prénom :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-file-earmark-person-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_prenom . "</p>
                                </div>

                            </div>
                            
                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Adresse mail :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-envelope-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'>" . $compte->user_email . "</p>
                                </div>

                            </div>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Date d'inscription :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-calendar2-check-fill'></i>
                                    <p class='text-lg ml-2 focus:outline-none'> le " . date("d/m/Y à H:i", strtotime($compte->user_date_ins)) . "</p>
                                </div>

                            </div>

                            <div>
                                <p class='text-charte_bleu_fonce block font-permanent_marker text-xl font-medium'>Date de dernière modification :</p>
                                
                                <div class='text-charte_bleu_clair py-1.5 flex items-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce'>
                                    <i class='bi bi-clock-history'></i>
                                    <p class='text-lg ml-2 focus:outline-none'> le " . date("d/m/Y à H:i", strtotime($compte->user_date_modif)) . "</p>
                                </div>

                            </div>
                            
                            <button class='font-permanent_marker cursor-pointer p-2.5 mt-3 flex justify-center rounded-md px-4 duration-300 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce' onclick='redirigerVersModificationCompte()''>
                                <p>Modifier mon compte</p>
                            </button>

                            <script>
                                function redirigerVersModificationCompte() {
                                    window.location.href = 'index.php?action=modification_compte';
                                }
                            </script>
                    </div>
                </div>
            </div>
        </div>";
?>

<?php $content = ob_get_clean();
require_once('template.php'); ?>