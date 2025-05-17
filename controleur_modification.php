<?php
/*
    * Rôle : Renvoi vers la page de modification pour éditer une tâche
    * Paramètres : via GET (id de la tâche)
    * Sorties : Aucun
 */
   require 'library/init.php';
   session_start();
   //
   require_once 'model/tache.php';
   //
   $id = $_GET['id'] ?? null;
   $tacheModel = new Tache();
   $tache = $tacheModel->find($id);
   include 'template/pages/vue_modification.php';
?>
