<?php
    /*
        Fragment formulaire HTML
        Role: Utilisation de ce fichier pour vue_connexion_creation.php et vue_profil_utilisateur.php.
        Traitement: Ajout d'un compte utilisateur et un deuxième pour la connexion
    */
    // Initialisation pour éviter les warnings si $tache n'est pas fourni
    if (!isset($tache)) {
        $tache = null;
    }
    
    // Récupération de l'utilisateur connecté (ou null)
    $user = $_SESSION['user'] ?? null
?>
<?php
    // Si un utilisateur est connecté
    if ($user):
?>
    <?php
        // Détermination du mode (ajout ou modification)
        $action = 'controleur_modification_retour.php';
        $titre = (is_array($tache) && isset($tache['titre'])) ? $tache['titre'] : '';
        $description = (is_array($tache) && isset($tache['description'])) ? $tache['description'] : '';
        $id = (is_array($tache) && isset($tache['id'])) ? $tache['id'] : '';
    ?>
    <!--------------------------------------------------------------------------------------------------->
    <!-- Affichage des erreurs éventuelles -->
    <?php if (isset($erreurs)): ?>
        <ul class="errors">
            <?php foreach ($erreurs as $erreur): ?>
                <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <!--------------------------------------------------------------------------------------------------->
    <!-- Formulaire d'ajout ou de modification de tâche -->
    <form action="<?= $action ?>" method="post">
    <?php 
        // Champ caché pour l'ID en mode modification
        if ($id):  
        ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
        <?php endif; ?>
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($titre) ?>" required>
            <label for="description">Description</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($description) ?></textarea>
            <div class="cta-modif-action">
            <button type="submit">
        <?= $id ? 'Modifier la tâche' : 'Ajouter une tâche' // Libellé dynamique ?>
        </button>
        </div>
    </form>
<!--------------------------------------------------------------------------------------------------->
    <?php else: ?>
        <!-- Si aucun utilisateur n'est connecté -->
        <!-- Affichage des erreurs de connexion/inscription -->
        <?php if (isset($erreurs)): ?>
        <ul class="errors">
            <?php foreach ($erreurs as $erreur): ?>
            <li><?= htmlspecialchars($erreur) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
<!--------------------------------------------------------------------------------------------------->
    <!-- Formulaire de connexion -->
    <h2>Connexion</h2>
    <form action="controleur_connexion.php" method="post">
        <label for="login">Login</label>
            <input type="text" id="login" name="login" required>
        <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        <div class="cta-action">
            <button type="submit" class="cta-action-main">Se connecter</button>
        </div>
    </form>
<!--------------------------------------------------------------------------------------------------->
    <!-- Formulaire d'inscription -->
    <h2>Inscription</h2>
    <form action="controleur_creation_compte.php" method="post">
        <label for="login_reg">Login</label>
            <input type="text" id="login_reg" name="login" required>
        <label for="password_reg">Mot de passe</label>
            <input type="password" id="password_reg" name="password" required>
        <div class="cta-action">
            <button type="submit" class="cta-action-main">Créer un compte</button>
        </div>
    </form>
<?php 
    // Fin du if utilisateur connecté
    endif;  
?>