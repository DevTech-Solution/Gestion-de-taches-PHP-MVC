<?php
/*
     * Rôle : Importer la vue d’accueil
     * Paramètres : "include" pour importer la vue
     * Sorties : Affichage de la vue (template/pages/vue_connexion_creation.php)
 */
    require 'library/init.php';
    //
    session_start();
    //
    require_once 'model/utilisateur.php';
    require_once 'model/tache.php';
    include 'template/pages/vue_connexion_creation.php';
?>
