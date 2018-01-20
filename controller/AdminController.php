<?php
class AdminController
{
  // AFFICHE TOUS les billets et les commentaires associés
   public function AllAdmin()
   {
        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllComments();
        require ('view/AdminView.php');
   }
   // CREATE -> Appel de la vue de création d'un billet
   public function CreateAdminPost()
   {
        require('view/CreateNewPostView.php');
   }
   // CREATION billet -> Récupère en paramètres les infos dont on a besoin
   public function CreateNewPost($author, $title, $content)
   {
       $postManager = new PostManager();
       $posts = $postManager->CreatePost($author,$title,$content);
       header('Location : index.php?action=admin');
   }
   // SUPPRESSION d'un billet ET de ses commentaires associés -> Récupère en paramètres les infos dont on a besoin
   public function deletePost($postId)
   {
      $postManager = new PostManager();
      $postManager->deletePost($postId);
      $commentManager = new CommentManager();
      $commentManager->deleteFromPost($postId);
      header('Location : index.php?action=admin');
   }
   // MISE A JOUR billet
   public function updateAdminPost()
   {
      $postManager = new PostManager();
      $postManager->updatePost($_POST['author'],$_POST['title'],$_POST['content'], $_GET['id']);
      header('Location : index.php?action=admin');
   }
   // SUPPRESSION commentaires ->  Récupère en paramètres les infos dont on a besoin
   public function deleteComment($commentId)
   {
      $commentManager = new CommentManager();
      $commentManager->deleteComment($commentId);
      header('Location: index.php?action=admin');
   }
   // MODIFIER post MISE A JOUR du post
  public function updateModifyPost()
   {
      $postManager = new PostManager();
      $post = $postManager->updateModifyPost($_GET['id']);
      require('view/updatePostView.php');
   }
   //APPROUVER commentaires signalés
   public function approveComment()
   {
      $commentManager = new CommentManager();
      $report = $commentManager->approveComment($_GET['id']);
      header('Location: index.php?action=admin');
   }
}
?>
