<?php ob_start(); ?>

<h1 class='text-center text-charte_bleu_fonce font-permanent_marker text-5xl mb-5'>Liste des utilisateurs</h1>

<div id="utilisateurs" class="border-4 border-charte_bleu_fonce rounded-lg table_justify overflow-x-auto">

    <table class="table table-hover border-2 rounded-lg w-full">
        <thead class='font-permanent_marker text-charte_bleu_fonce text-xl text-center'>
            <tr>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">ID</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Type</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Statut</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Pseudo</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Adresse-Mail</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Prenom</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Nom</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Date de création du compte</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Dernière modification du compte</th>
                <th class="whitespace-nowrap border-r-2 border-charte_bleu_fonce align-middle" scope="col">Gérer</th>
            </tr>
        </thead>

        <tbody class='text-charte_bleu_clair border-t-2 border-charte_bleu_fonce text-lg text-center'>
            <?php foreach ($utilisateurs as $utilisateur) { ?>
                <tr class="border-b border-charte_bleu_fonce hover:text-charte_bleu_fonce">
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle" scope="row"><?php echo $utilisateur->user_id ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->typ_intitule ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->sta_intitule ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->user_pseudo ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->user_email ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->user_prenom ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo $utilisateur->user_nom ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo "le " . date("d/m/Y à H:i", strtotime($utilisateur->user_date_ins)) . ""; ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle"><?php echo "le " . date("d/m/Y à H:i", strtotime($utilisateur->user_date_modif)) . ""; ?></td>
                    <td class="whitespace-nowrap border-r border-charte_bleu_fonce align-middle">
                        <a href="index.php?action=supprimer_utilisateur&user_id=<?php echo $utilisateur->user_id ?>"><button class="font-permanent_marker cursor-pointer p-2.5 w-fit justify-center rounded-md px-2 border-2 text-charte_bleu_clair border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4">Supprimer le compte</button></a>

                        <a href="index.php?action=bannir_utilisateur&user_id=<?php echo $utilisateur->user_id ?>">
                            <button class="font-permanent_marker w-fit p-2.5 justify-center rounded-md px-2 border-2 text-charte_bleu_fonce border-charte_bleu_fonce hover:border-charte_bleu_fonce hover:bg-charte_bleu_clair hover:text-charte_bleu_fonce hover:border-4">
                                <?php echo (strtolower($utilisateur->sta_intitule) === 'actif') ? 'Bannir' : 'Debannir'; ?>
                            </button>
                        </a>

                        <a href="index.php?action=modifier_utilisateur&user_id=<?php echo $utilisateur->user_id ?>"><button class="font-permanent_marker cursor-pointer p-2.5 w-fit justify-center rounded-md px-2 border-2 border-charte_bleu_fonce text-charte_blanc mx-auto bg-charte_bleu_clair hover:border-charte_bleu_clair hover:bg-charte_bleu_fonce hover:border-4">Modifier</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>
