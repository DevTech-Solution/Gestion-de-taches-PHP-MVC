<?php
/*
    * Rôle : Permet de supprimer une tâche et de revenir sur la page profil utilisateur
    * Paramètres : via GET (id de la tâche)
    * Sorties : Aucun
 */
    require "library/init.php";
    session_start();
    //
    require_once "model/tache.php";
    //
    $id = $_GET['id'] ?? null;
    $tacheModel = new Tache();
    if ($id) {
        $tacheModel->deleteTask($id);
    }
    $taches = $tacheModel->findAllByUser($_SESSION['user']['id']);
    include "template/pages/vue_profil_utilisateur.php";
?>
