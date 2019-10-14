<?php
require_once('libraries/models/Model.php');


class Comment extends Model {

    
    /**
     * Find all comments of an article 
     *
     * @param integer $article_id
     * @return array
     */
    public function findAllWithArticle(int $article_id) :array {

        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }
    
    /**
     * Select one comment
     *
     * @param integer $id
     * @return void
     */
    public function find(int $id) {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
        $comment = $query->fetch();
        return $comment;
    }
    /**
     * Deleting one comment
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id) :void {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
        $query->execute(['id' => $id]);
    }
    /**
     * Create a comment
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id ) :void {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }



}