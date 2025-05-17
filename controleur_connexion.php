<?php
/**
     * Rôle : Renvoi vers la vue profil utilisateur et vérification des identifiants
     * Paramètres : via POST (login, mot de passe) et Fetch.
     * Sorties : include uniquement du fichier "vue_profil_utilisateur.php"
     * + Message erreur
 */
    //
    require 'library/init.php';
    //
    session_start();
    //
    require_once 'model/utilisateur.php';
    require_once 'model/tache.php';
    //
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $login = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';
        $utilisateur = new Utilisateur();
        $user = $utilisateur->login($login, $password);
        if ($user) {
            $_SESSION['user'] = $user;
            $tache = new Tache();
            $taches = $tache->findAllByUser($user['id']);
            include "template/pages/vue_profil_utilisateur.php";
        } else {
            // MESSAGE ERREUR
            $erreurs = ['Identifiants invalides'];
            include "template/pages/vue_connexion_creation.php";
        }
    } 
    else {
        include "template/pages/vue_profil_utilisateur.php";
    }
?>
