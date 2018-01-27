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
   public function showlogin()//OK
     {
       require('view/LoginView.php');
     }
  public function signin($login,$password)//OK
     {
        $user = $this->user->getUsername($login,$password);
        if($user){
          $_SESSION['admin'] = $user;
          header('Location:index.php?action=admin');
        }
        else{
          throw new Exception('Mauvaise saisie de l\'identifiant ou du mot de passe');
        }
     }
  public function allAdmin()//OK
   {
        $posts = $this->post->getAllPosts();
        $comments = $this->comment->getAllComments();
        require ('view/AdminView.php');
   }
   public function createAdminPost()//OK
   {
        require('view/CreateNewPostView.php');
   }
   public function createNewPost($author, $title, $content)//OK
   {
       $post = new Post([
         'author' => $author,
         'title' => $title,
         'content' => $content
       ]);
       $this->post->createPost($post);
       header('Location : index.php?action=admin');
   }
   public function deletePost($postId)//OK
   {
      $this->post->deletePost($postId);
      $this->comment->deleteFromPost($postId);
      header('Location : index.php?action=admin');
   }
   public function updateAdminPost($author,$title,$content)
   {
     $post = new Post([
        'author' => $author,
        'title' => $title,
        'content' => $content
      ]);
        $post = $this->post->updatePost($post);
      header('Location : index.php?action=admin');

   }
   public function updateModifyPost($postId)//OK ne pas toucher
   {
     $post = $this->post->updateModifyPost($postId);
     require('view/updatePostView.php');
   }
   public function deleteComment($commentId)//OK
   {
     $this->comment->deleteComment($commentId);
      header('Location: index.php?action=admin');
   }
   public function approveComment()//OK
   {
      $this->comment->approveComment($_GET['id']);
      header('Location: index.php?action=admin');
   }
}
