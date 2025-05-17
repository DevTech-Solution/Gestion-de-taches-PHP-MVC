<?php
/*
    * Rôle : Permet de créer le compte de l’utilisateur
    * Paramètres : via POST (envoi de données du formulaire à la bdd (POO)) 
    * Sorties : renvoi vers la vue "template\pages\vue_connexion_creation.php" (include)
 */
    require 'library/init.php';
    require_once 'model/utilisateur.php';
    //
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $utilisateur = new Utilisateur();
        $utilisateur->register($login, $password);
    }
    include "template/pages/vue_connexion_creation.php"
?>
