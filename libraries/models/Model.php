<?php

namespace Models;

abstract class Model {

    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }

    /**
    * Find one 
    *
    * @param integer $id
    * @return $article
    */
    public function find(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item;
    }
    
    /**
     * Deleting 
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) :void {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    /**
    * Return all  
    *
    * @return array
    */
    public function findAll(?string $order = "") :array {
        $sql = "SELECT * FROM {$this->table}";
        if ($order) {
            $sql .= " ORDER BY " . $order;
        }
        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();
        return $articles;
        }
}