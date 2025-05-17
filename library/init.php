<?php
/*
  Rôle: Initialiser la configuration commune à tous les contrôleurs.
  Sorties: Affichage des erreurs activé (display_errors, error_reporting).
 */

  // Mise en place des messages d'erreur (pour la mise au point)
  ini_set('display_errors',1);
  error_reporting(E_ALL);

  // Ouvrir la BDD dans la variable globale $bdd
  $host     = '';
  $dbname   = '';
  $charset  = 'UTF8';
  $username = '';
  $password = '';

  $dsn = "mysql:host={$host};dbname={$dbname};charset={$charset}";

  try {
      $bdd = new PDO($dsn, $username, $password);
      $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo "Erreur de connexion : " . $e->getMessage();
      exit;
  }
?>