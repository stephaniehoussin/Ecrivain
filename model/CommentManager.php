<?php
// Rôle -> Manager -> effectuer opérations de lecture ecriture sur les tables -> CRUD
class CommentManager extends Manager
{
   // READ = Affichage de  TOUS les commentaires
   public function getAllComments()
   {
        $req = $this->db()->query('SELECT id,postId, author, comment,is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')AS comment_date_fr  FROM comments ORDER BY comment_date');
        return $req;
   }
    // READ =  Récupère les commentaires en fonction d'un post précis
    // Récupère en paramètres les infos dont on a besoin
    public function getComments($postId)
    {
        $comments = $this->db()->prepare('SELECT id,author,comment , is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')AS comment_date_fr FROM comments WHERE postId = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));
        return $comments;
    }
  // CREATE commentaires
  // Ajoute les commentaires en fonction du post
  // Récupère en paramètres les infos dont on a besoin
  public function addComment($postId, $author, $comment)
  {
      $comments = $this->db()->prepare('INSERT INTO comments(postId,author,comment,comment_date) VALUES(?,?,?,NOW())');
      $affectedLines = $comments->execute(array($postId,$author,$comment));
      return $affectedLines;
  }
    // DELETE
    // Supprime les commentaires
    // Récupère en paramètres les infos dont on a besoin
    public function deleteComment($commentId)
    {
        $req = $this->db()->prepare('DELETE FROM comments WHERE id= ?');
        $req->execute(array($commentId));
        return $req;
    }
    // DELETE
    // supprime les commentaires en fonction du post
    // Récupère en paramètres les infos dont on a besoin
    public function deleteFromPost($postId)
    {
       $req = $this->db()->exec('DELETE FROM comments WHERE postid = '.$postId);
    }
   // Faire fonction qui permet de signaler COMMENTAIRES
   // reportComment
   // Récupère en paramètres les infos dont on a besoin
   public function  reportComment($id)
   {
     $req= $this->db()->prepare('UPDATE comments SET is_signaled= 1 WHERE id= ?');
     $req->bindValue(1, $id , PDO::PARAM_INT);
     $req->execute();
     $req->closeCursor();
   }
   // Récupère en paramètres les infos dont on a besoin
   public function approveComment($id)
   {
     $req = $this->db()->prepare('UPDATE comments SET is_signaled = 0 WHERE id= ?');
     $req->bindValue(1, $id, PDO::PARAM_INT);
     $req->execute();
     $req->closeCursor();
   }
}
