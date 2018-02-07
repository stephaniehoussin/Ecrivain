<?php
class CommentManager extends Manager
{
   public function getAllComments()
   {
        $comments = [];
        $req = $this->db()->query('SELECT id,postId, author, comment,is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')
                                   AS comment_date
                                   FROM comments
                                   ORDER BY comment_date
                                   DESC ');
        while($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
          $comments[] = new Comment($donnees);
        }
        return $comments;
   }

    public function getOnePostComments($postId)
    {
        $comments = [];
        $req = $this->db()->prepare('SELECT id,author,comment , is_signaled, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%i\')
                                     AS comment_date
                                     FROM comments
                                     WHERE postId = ?
                                     ORDER BY comment_date
                                     DESC');
        $req->execute(array($postId));
        while($donnees = $req->fetch(PDO::FETCH_ASSOC))
        {
          $comments[] = new Comment($donnees);
        }
        return $comments;
    }

   public function addComment(Comment $comment)
   {
        $req = $this->db()->prepare('INSERT INTO comments(postId,author,comment,comment_date)
                                     VALUES(:postId, :author, :comment,NOW())');
        $req->bindValue(':postId',$comment->getPostId());
        $req->bindValue(':author',$comment->getAuthor());
        $req->bindValue(':comment',$comment->getComment());
        $req->execute();
   }

   public function deleteComment($commentId)
   {
        $req = $this->db()->prepare('DELETE FROM comments
                                     WHERE id= ?');
        $req->execute(array($commentId));
        return $req;
   }

   public function deleteFromPost($postId)
   {
        $req = $this->db()->exec('DELETE FROM comments
                                  WHERE postid = '.$postId);
   }

   public function  reportComment($id)
   {
        $req= $this->db()->prepare('UPDATE comments
                                    SET is_signaled= 1
                                    WHERE id='.$id);
        $req->execute();
   }

   public function approveComment($id)
   {
        $req = $this->db()->prepare('UPDATE comments
                                     SET is_signaled = 0
                                     WHERE id= ?');
        $req->bindValue(1, $id, PDO::PARAM_INT);
        $req->execute();
        //$req->closeCursor();
   }

   public function countComments()
   {
     $req = $this->db()->prepare('SELECT COUNT(*)
                                  FROM comments');
     $req->execute();
     $datas = $req->fetchAll();
     //$req->closeCursor();
     return $datas[0];
   }

   public function countCommentsReport()
   {
     $req = $this->db()->prepare('SELECT COUNT(*)
                                  FROM comments
                                  WHERE is_signaled=1');
     $req->execute();
     $datas = $req->fetchAll();
     //$req->closeCursor();
     return $datas[0];
   }
}
