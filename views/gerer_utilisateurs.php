<?php ob_start(); ?>

<h1>Liste des utilisateurs</h1>

<div id="utilisateurs" class="table_justify">


        <table class="table table-hover">
        
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type d'utilisateur</th>
                <th scope="col">Statut d'utilisateur</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Adresse-Mail</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Date de création du compte</th>
                <th scope="col">Dernière date de modification du compte</th>
                <th scope="col">Gerer</th>
                
            </tr>
        </thead>

        <tbody>
            <?php
                foreach ($utilisateurs as $utilisateur) {
            ?>
            <tr>
                <th scope="row"><?php echo $utilisateur->user_id ?></th>
                <td> <?php echo $utilisateur->typ_intitule ?> </td>
                <td> <?php echo $utilisateur->sta_intitule ?> </td>
                <td> <?php echo $utilisateur->user_pseudo ?> </td>
                <td> <?php echo $utilisateur->user_email ?> </td>
                <td> <?php echo $utilisateur->user_prenom ?> </td>
                <td> <?php echo $utilisateur->user_nom ?> </td>
                <td> <?php echo date("d/m/Y à H:i", strtotime($utilisateur->user_date_ins)) ?> </td>
                <td> <?php echo date("d/m/Y à H:i", strtotime($utilisateur->user_date_modif)) ?> </td>
                <td>
                    <a href="index.php?action=supprimer_utilisateur&user_id=<?php echo $utilisateur->user_id ?>"><button class="btn btn-outline-danger">Suppr</button></a>
                    <a href="index.php?action=bannir_utilisateur&user_id=<?php echo $utilisateur->user_id ?>"><button class="btn btn-outline-danger">Bannir</button></a>
                    <a href="index.php?action=modifier_utilisateur&user_id=<?php echo $utilisateur->user_id ?>"><button class="btn btn-outline-warning">Modifier</button></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>

        </table>
    </div>

<?php $content = ob_get_clean();
require_once('template.php'); ?>