<?php
/*
     * Rôle : Afficher le formulaire de modification d’une tâche ou d’un retour existant
     * Paramètres : inclure le fragment "formulaire.php"
     * CREATION OU CONNEXION VIA LE FRAGMENT DU FORMULAIRE
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification des tâches</title>
        <meta name="description" content="Page Modification de gestion de tâches">
        <meta name="keywords" content="tâches, gestion, utilisateur">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body class="page-modification">
        <header>
            <h1>Modification des tâches</h1>
            <nav>
                <ul>
                    <li><a href="controleur_deconnexion.php">Deconnexion</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="container-modification">
                <h1>Tâche</h1>
                <?php
                    // IMPORTER FORMULAIRE
                    include "template/fragment/formulaire.php";
                ?>
            </div>
        </main>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Site de Gestion de tâches</p>
            <p>Réalisé par Sébastien C.</p>
        </footer>
        <script src="js/script.js"></script>
    </body>
</html>
