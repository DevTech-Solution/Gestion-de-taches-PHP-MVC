<?php
/*
     * Rôle : Afficher le profil utilisateur et la liste de ses tâches / retours.
     * Utilisation du fragment  "template\fragment\tableau.php" dans ce fichier.
     * Paramètres : utilisation des class méthodes pour la sortie du resultats
     * Sorties : affichage du tableau des taches
 */
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profil utilisateur - Mon Site MVC</title>
        <meta name="description" content="Page Profil utilisateur de gestion de tâches">
        <meta name="keywords" content="tâches, gestion, utilisateur">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body class="page-profil">
        <header>
            <h1>Votre vue de gestion de vos tâches</h1>
            <nav>
                <ul class="deconnection-cta">
                    <a href="controleur_deconnexion.php">Se déconnecter</a>
                </ul>
            </nav>
        </header>
        <main>
            <div class="title-profil">
                <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION['user']['login']); ?></h2>
            </div>
            <?php 
                // IMPORTER FORMULAIRE
                include "template/fragment/formulaire.php";
                // IMPORTER TABLEAU
                include "template/fragment/tableau.php";
            ?>
        </main>
        <footer>
            <p>&copy; <?php echo date('Y'); ?> Site de Gestion de tâches</p>
            <p>Réalisé par Sébastien C.</p>
        </footer>
        <script src="js/script.js"></script>
    </body>
</html>
