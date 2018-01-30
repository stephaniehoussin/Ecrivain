<?php
class FrontController
{
   protected $post;
   protected $comment;

   public function __construct()
   {
      $this->post = new PostManager();
      $this->comment = new CommentManager();
   }

   public function home()
   {
      $lastPost = $this->post->getLastPost();
      require('view/HomeView.php');
   }

   public function allPosts()
   {
      $posts = $this->post->getAllPosts();
      require('view/PostsView.php');
   }

   public function onePost()
   {
      $post = $this->post->getOnePost($_GET['id']);
      $comments = $this->comment->getComments($_GET['id']);
      require('view/postView.php');
   }

   public function addComment($postId,$author,$comment)
   {
      $comment = new Comment([
         'postId' => $postId,
         'author' => $author,
         'comment' => $comment
    ]);
      $this->comment->addComment($comment);
        if($comment === false)
        {
            throw new Exception('Impossible d\'ajouter le commentaire');
        }
        else
        {
            header('Location: index.php?action=post&id=' .$postId);
        }
   }

   public function reportComment($id,$postId)
   {
      $this->comment->reportComment($_GET['id']);
      header('Location: index.php?action=post&id=' .$postId);
   }
}
