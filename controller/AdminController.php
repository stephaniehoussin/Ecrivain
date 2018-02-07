<?php
class AdminController
{
   protected $user;
   protected $post;
   protected $comment;

   public function __construct()
   {
      $this->user = new UserManager();
      $this->post = new PostManager();
      $this->comment = new CommentManager();
   }

   public function showlogin()
   {
      require('view/LoginView.php');
   }

   public function signin($login,$password)
   {
      $user = $this->user->getUsername($login,$password);
        if($user)
        {
            $_SESSION['admin'] = $user;
            header('Location:index.php?action=admin');
        }
        else
        {
            throw new Exception('Mauvaise saisie de l\'identifiant ou du mot de passe');
        }
   }

   public function allAdmin()
   {
      $posts = $this->post->getAllPosts();
      $postsNbr = $this->post->countPosts();
      $comments = $this->comment->getAllComments();
      $commentsNbr = $this->comment->countComments();
      $commentsReport = $this->comment->countCommentsReport();
      require ('view/AdminView.php');
   }

   public function createAdminPost()
   {
      require('view/CreateNewPostView.php');
   }

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

   public function deletePost($postId)
   {
      $this->post->deletePost($postId);
      $this->comment->deleteFromPost($postId);
      header('Location :index.php?action=admin');
   }

   public function updatePost()
   {
      $this->post->updatePost($_POST['author'],$_POST['title'],$_POST['content'], $_GET['id']);
      header('Location : index.php?action=admin');
   }

   public function updateModifyPost()
   {
      $post = $this->post->updateModifyPost($_GET['id']);
      require('view/updatePostView.php');
   }

   public function deleteComment($commentId)
   {
      $this->comment->deleteComment($commentId);
      header('Location: index.php?action=admin');
   }

   public function approveComment()
   {
      $this->comment->approveComment($_GET['id']);
      header('Location: index.php?action=admin');
   }

}
