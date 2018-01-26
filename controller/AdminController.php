<?php
class AdminController
{
   public function showlogin()
     {
       require('view/LoginView.php');
     }
    public function signin($login,$password)
     {
        $userManager = new UserManager();
        $result = $userManager->getUsername($login,$password);

        if($result){
          $_SESSION['id'] = $result['id'];
          header('Location:index.php?action=admin');
        }
        else{
          throw new Exception('Mauvaise saisie de l\'identifiant ou du mot de passe');
        }
     }
  // AFFICHE TOUS les billets et les commentaires associés
   public function allAdmin()
   {
        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();
        $commentManager = new CommentManager();
        $comments = $commentManager->getAllComments();
        require ('view/AdminView.php');
   }
   // CREATE -> Appel de la vue de création d'un billet
   public function createAdminPost()
   {
        require('view/CreateNewPostView.php');
   }
   // CREATION billet -> Récupère en paramètres les infos dont on a besoin
   public function createNewPost($author, $title, $content)
   {
       $postManager = new PostManager();
       $posts = $postManager->createPost($author,$title,$content);
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
