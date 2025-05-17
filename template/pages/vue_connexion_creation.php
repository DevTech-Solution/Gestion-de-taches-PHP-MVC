<?php
/*
     * Rôle : Afficher le formulaire de connexion et d’inscription
     * Paramètres : Éventuellement [ $erreurs ] en cas d’échec
     * Sorties : méthodes des fichiers ("model\utilisateur.php", "model\tache.php" et "model\_model.php")
     * Utilisation du fragment (template\fragment\formulaire.php)
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gestion des tâches - Connexion creation</title>
        <meta name="description" content="Page Connexion creation de gestion de tâches">
        <meta name="keywords" content="tâches, gestion, utilisateur">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body class="page-connexion">
        <header>
            <h1>Gestion des tâches - Connexion creation</h1>
        </header>
        <main>
            <div class="title-profil">
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
