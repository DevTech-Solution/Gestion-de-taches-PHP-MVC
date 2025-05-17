<?php
/**
     * Rôle : Déconnecte l’utilisateur en cliquant sur le bouton.
     * Paramètres : Appel de la function session_start() et session_destroy().
     * Sorties : include de controleur_accueil.php. 
 */
    session_start();
    session_destroy();
    //
    include "controleur_accueil.php";
?>
