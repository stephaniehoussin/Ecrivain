<?php
class CommentController
{
  // CREATE  Ajout de commentaires -> Récupère en paramètres les infos dont on a besoin
  public function addComment($postId,$author,$comment)
  {
      $commentManager = new CommentManager();
      $affectedLines = $commentManager->addComment($postId,$author,$comment);
          if($affectedLines === false)
            {
                throw new Exception('Impossible d\'ajouter le commentaire');
            }
          else
           {
              header('Location: index.php?action=post&id=' .$postId);
            }
  }
  // fonction qui permet de signaler un commentaire
  public function reportComment()
  {
      $commentManager = new CommentManager();
      $report = $commentManager->reportComment($_GET['id']);
      header('Location: index.php?action=post&id='.$_GET['postId']);
  }
}
?>
