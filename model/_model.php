<?php
    /**
         * Rôle : Classe Parent de l’héritage
         * Cette classe fournit les propriétés et méthodes de base pour toutes les Class utilisés avec leurs méthodes respectivent.
         *
         * Paramètres :
         *     Nom identifiant de l’instance du parent.
         *     Tableau associatif des options de traitement :
         */
    class Model {
        protected $bdd;
        protected $table;
        /**
         * Rôle: Exécute la fonction `__construct`.
         *
         * Paramètres:
         *   - $table: description
         *
         * Retour: description
         */
        public function __construct($table) {
            global $bdd;
            $this->bdd = $bdd;
            $this->table = $table;
        }
        /**
         * Rôle: Exécute la fonction `find`.
         *
         * Paramètres:
         *   - $id: description
         *
         * Retour: description
         */
        public function find($id) {
            $stmt = $this->bdd->prepare("SELECT * FROM {$this->table} WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        /**
         * Rôle: Exécute la fonction `findAll`.
         *
         * Retour: description
         */
        public function findAll() {
            $stmt = $this->bdd->query("SELECT * FROM {$this->table}");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        /**
         * Rôle: Exécute la fonction `create`.
         *
         * Paramètres:
         *   - $data: description
         *
         * Retour: description
         */
        public function create(array $data) {
            $keys = array_keys($data);
            $fields = implode(',', $keys);
            $placeholders = implode(',', array_fill(0, count($keys), '?'));
            $stmt = $this->bdd->prepare("INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})");
            $stmt->execute(array_values($data));
            return $this->bdd->lastInsertId();
        }
        /**
         * Rôle: Exécute la fonction `update`.
         *
         * Paramètres:
         *   - $id: description
         *   - $data: description
         *
         * Retour: description
         */
        public function update($id, array $data) {
            $keys = array_keys($data);
            $fields = implode('=?,', $keys) . '=?';
            $stmt = $this->bdd->prepare("UPDATE {$this->table} SET {$fields} WHERE id = ?");
            $stmt->execute(array_merge(array_values($data), [$id]));
            return $stmt->rowCount();
        }
        /**
         * Rôle: Exécute la fonction `delete`.
         *
         * Paramètres:
         *   - $id: description
         *
         * Retour: description
         */
        public function delete($id) {
            $stmt = $this->bdd->prepare("DELETE FROM {$this->table} WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->rowCount();
        }
    }
?>