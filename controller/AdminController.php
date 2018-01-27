<?php
class AdminController
{
   protected $result;
   protected $post;
   protected $comment;
   protected $report;

   public function __construct()
   {
     $this->result = new UserManager();
     $this->post = new PostManager();
     $this->comment = new CommentManager();
     $this->report = new CommentManager();
   }

   public function showlogin()
     {
       require('view/LoginView.php');
     }
     // UserManager- > methode connexion
    public function signin($login,$password)
     {
        $result = $this->result->getUsername($login,$password);
        if($result){
          $_SESSION['id'] = $result['id'];
          header('Location:index.php?action=admin');
        }
        else{
          throw new Exception('Mauvaise saisie de l\'identifiant ou du mot de passe');
        }
     }
  // AFFICHE TOUS les billets et les commentaires associés
   // PostManager - > Methode pour afficher TOUS les BILLETS
   // CommentManager -> Methode pour afficher TOUS les commentaires
   public function allAdmin()
   {
        $posts = $this->post->getAllPosts();
        $comments = $this->comment->getAllComments();
        require ('view/AdminView.php');
   }
   // CREATE -> Appel de la vue de création d'un billet
   public function createAdminPost()
   {
        require('view/CreateNewPostView.php');
   }
   // CREATION billet -> Récupère en paramètres les infos dont on a besoin
   // PostManager -> methode pour créer nouveau billet
   public function createNewPost($author, $title, $content)
   {
       $post = new Post([
         'author' => $author,
         'title' => $title,
         'content' => $content
       ]);
       $this->post->createPost($post);
       header('Location : index.php?action=admin');
   }
   // SUPPRESSION d'un billet ET de ses commentaires associés -> Récupère en paramètres les infos dont on a besoin
    // PostManager -> Suppression post
    // COmmentManager -> suppresion commentaires associés
   public function deletePost($postId)
   {
      $this->post->deletePost($postId);
      $this->comment->deleteFromPost($postId);
      header('Location : index.php?action=admin');
   }
   // MISE A JOUR billet
   public function updateAdminPost()
   {
      $this->post->updatePost($_POST['author'],$_POST['title'],$_POST['content'], $_GET['id']);
      //$postManager->updatePost($_POST['author'],$_POST['title'],$_POST['content'], $_GET['id']);
      header('Location : index.php?action=admin');
   }
   // SUPPRESSION commentaires ->  Récupère en paramètres les infos dont on a besoin
   public function deleteComment($commentId)
   {
     $this->comment->deleteComment($commentId);
      header('Location: index.php?action=admin');
   }
   // MODIFIER post MISE A JOUR du post
  public function updateModifyPost()
   {
      $this->post->updateModifyPost($_GET['id']);
      require('view/updatePostView.php');
   }
   //APPROUVER commentaires signalés
   public function approveComment()
   {
      $this->report->approveComment($_GET['id']);
      header('Location: index.php?action=admin');
   }
}
