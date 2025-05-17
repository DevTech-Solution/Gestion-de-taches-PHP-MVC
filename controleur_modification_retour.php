<?php
/**
     * Rôle : Récupère les données modifiées envoyées par le formulaire de “retour”
     * Paramètres : via POST titre, description
     * Sorties : retour vers la vue "vue_profil_utilisateur.php"
 */
    require 'library/init.php';
    session_start();
    //
    require_once 'model/tache.php';
    //
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'] ?? null;
        $titre = $_POST['titre'] ?? '';
        $description = $_POST['description'] ?? '';
        $tacheModel = new Tache();
        if ($id) {
            $tacheModel->updateTask($id, $titre, $description);
        } else {
            $utilisateur_id = $_SESSION['user']['id'];
            $tacheModel->createTask($titre, $description, $utilisateur_id);
        }
        $taches = $tacheModel->findAllByUser($_SESSION['user']['id']);
        include 'template/pages/vue_profil_utilisateur.php';
        //
    } else {
        header('Location: controleur_accueil.php');
        exit;
    }
?>
