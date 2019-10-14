<?php

require_once('libraries/models/Model.php');

class Article extends Model {

    /**
    * Return all articles 
    *
    * @return array
    */
    public function findAll() :array {
        $resultats = $this->pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
        $articles = $resultats->fetchAll();
        return $articles;
        }

    /**
    * Find one article
    *
    * @param integer $id
    * @return $article
    */
    public function find(int $id) {
        $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
        $query->execute(['article_id' => $id]);
        $article = $query->fetch();
        return $article;
    }

    /**
     * Deleting an article
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) :void {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->execute(['id' => $id]);
    }








}