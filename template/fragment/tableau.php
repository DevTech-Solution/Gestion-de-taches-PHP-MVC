<?php
/*
    Fragment Tableau HTML
    Role : Utilisation du fichier "template\pages\vue_profil_utilisateur.php"
    Traitement : Foreach du tableau des données de FETCH ALL + Condition si taches existent
 */
// Fragment de tableau des tâches
if (!empty($taches)): ?>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($taches as $tache): ?>
                <tr>
                    <td><?= htmlspecialchars($tache['titre']) ?></td>
                    <td><?= htmlspecialchars($tache['description']) ?></td>
                    <td>
                        <a href="controleur_modification.php?id=<?= $tache['id'] ?>">Modifier</a> |
                        <a href="controleur_suppression.php?id=<?= $tache['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="information-tache">
        <p>Aucune tâche pour le moment.</p>
    </div>
<?php endif; ?>