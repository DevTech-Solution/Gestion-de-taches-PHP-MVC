<?php
    /*
        * Rôle: Description du fichier utilisateur.php.
    */
        //IMPORTER MODEL POUR METHODE CLASS UTILISATEUR
        require_once '_model.php';
    /*
        Class Utilisateurs (heritage de model)
        Utilisation du fichier "model\_model.php" 
        - register: enregistrement utilisateur (login, password)
        - login: vérification des identifiants
    */
    class Utilisateur extends Model {
        /**
         * Rôle: Exécute la fonction `__construct`.
         *
         * Retour: description
         */
        public function __construct() {
            parent::__construct('utilisateurs');
        }
        /**
         * Rôle: Exécute la fonction `register`.
         *
         * Paramètres:
         *   - $login: description
         *   - $password: description
         *
         * Retour: description
         */
        public function register($login, $password) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            return $this->create(['login' => $login, 'password' => $hash]);
        }
        /**
         * Rôle: Exécute la fonction `login`.
         *
         * Paramètres:
         *   - $login: description
         *   - $password: description
         *
         * Retour: description
         */
        public function login($login, $password) {
            $stmt = $this->bdd->prepare("SELECT * FROM {$this->table} WHERE login = ?");
            $stmt->execute([$login]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
            return false;
        }
    }
?>