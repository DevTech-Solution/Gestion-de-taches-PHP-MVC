<?php
    /*
        Rôle: Description du fichier tache.php.
        Inclusion du model.php si besoin en fonction des methodes de la Class Tache
    */
    require_once '_model.php';
    /*
        Class Tache (héritage de Model)
        Méthodes :
        - createTask: créer une tâche pour un utilisateur
        - updateTask: modifier une tâche
        - deleteTask: supprimer une tâche
        - findAllByUser: récupérer toutes les tâches d'un utilisateur
    */
    class Tache extends Model {
        /**
         * Rôle: Exécute la fonction `__construct`.
         *
         * Retour: description
         */
        public function __construct() {
            parent::__construct('taches');
        }
        /**
         * Rôle: Exécute la fonction `createTask`.
         *
         * Paramètres:
         *   - $titre: description
         *   - $description: description
         *   - $utilisateur_id: description
         *
         * Retour: description
         */
        public function createTask($titre, $description, $utilisateur_id) {
            return $this->create(['titre' => $titre, 'description' => $description, 'utilisateur_id' => $utilisateur_id]);
        }
        /**
         * Rôle: Exécute la fonction `updateTask`.
         *
         * Paramètres:
         *   - $id: description
         *   - $titre: description
         *   - $description: description
         *
         * Retour: description
         */
        public function updateTask($id, $titre, $description) {
            return $this->update($id, ['titre' => $titre, 'description' => $description]);
        }
        /**
         * Rôle: Exécute la fonction `deleteTask`.
         *
         * Paramètres:
         *   - $id: description
         *
         * Retour: description
         */
        public function deleteTask($id) {
            return $this->delete($id);
        }
        /**
         * Rôle: Exécute la fonction `findAllByUser`.
         *
         * Paramètres:
         *   - $utilisateur_id: description
         *
         * Retour: description
         */
        public function findAllByUser($utilisateur_id) {
            $stmt = $this->bdd->prepare("SELECT * FROM {$this->table} WHERE utilisateur_id = ?");
            $stmt->execute([$utilisateur_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>