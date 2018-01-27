<?php
class CommentManager extends Manager
{
   // READ = Affichage de  TOUS les commentaires
   public function getAllComments()
   {
        $comments = [];
        $req = $this->db()->query('SELECT id,postId, author, comment,is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')AS comment_date_fr  FROM comments ORDER BY comment_date');
        while($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
          $comments[] = new Comment($donnees);
        }
        return $comments;
   }
    // READ =  Récupère les commentaires en fonction d'un post précis
    // Récupère en paramètres les infos dont on a besoin
    public function getComments($postId)
    {
        $comments = [];
        $req = $this->db()->prepare('SELECT id,author,comment , is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')AS comment_date_fr FROM comments WHERE postId = ? ORDER BY comment_date DESC');
        $req->execute(array($postId));
        while($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
          $comments[] = new Comment($donnees);
        }
        return $comments;
    }
  // Ajoute les commentaires en fonction du post
  // Récupère en paramètres les infos dont on a besoin
  public function addComment(Comment $comment)//OK
  {
      //$comment = new Comment();
      $req = $this->db()->prepare('INSERT INTO comments(postId,author,comment,comment_date) VALUES(:postId, :author, :comment,NOW())');
      $req->bindValue(':postId',$comment->getPostId());
      $req->bindValue(':author',$comment->getAuthor());
      $req->bindValue(':comment',$comment->getComment());
      $req->execute();

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
    $report = [];
    $req= $this->db()->prepare('UPDATE comments SET is_signaled= 1 WHERE id= ?');
    $req->execute();
    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $report[] = new Comment($donnees);
    }
    return $report;

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
