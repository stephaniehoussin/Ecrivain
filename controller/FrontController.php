<?php
class FrontController
{
 protected $post;
 protected $comment;
 protected $report;

  public function __construct(){
    $this->post = new PostManager();
    $this->comment = new CommentManager();
    $this->report = new CommentManager();
  }
  // PostManager -> méthode de recup des 2 derniers posts
  public function home()
  {
      $lastPost = $this->post->getLastPost();
      require('view/HomeView.php');
  }
  // postManager -> methode de recup de TOUS les posts
  public function allPosts()
  {
      $posts = $this->post->getAllPosts();
      require('view/PostsView.php');
  }
  // PostManager -> methode de recup de 1 post
  // CommentManager -> methode commentaires associés à ce post
public function onePost()
{
    $post = $this->post->getOnePost($_GET['id']);
    $comments = $this->comment->getComments($_GET['id']);
    require('view/postView.php');
}
// CREATE  Ajout de commentaires -> Récupère en paramètres les infos dont on a besoin
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
// fonction qui permet de signaler un commentaire
public function reportComment($id,$postId)//ok
{
     $this->report->reportComment($_GET['id']);
    //$report = $this->report->reportComment($_GET['id']);
    header('Location: index.php?action=post&id=' .$postId);
}
}
