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
  // Appel PostManager et sa méthode de recup des 2 derniers posts
  public function home()
  {
      $lastPost = $this->post->getLastPost();
      require('view/HomeView.php');
  }
  // Appel postManager et sa methode de recup de TOUS les posts
  public function allPosts()
  {
      $posts = $this->post->getAllPosts();
      require('view/PostsView.php');
  }
  // Appel PostManager et sa methode de recup de 1 post
  // Appel CommentManager et sa methode commentaires associés à ce post
public function onePost()
{
    $post = $this->post->getOnePost($_GET['id']);
    $comments = $this->comment->getComments($_GET['id']);
    require('view/postView.php');
}
// CREATE  Ajout de commentaires -> Récupère en paramètres les infos dont on a besoin
public function addComment($postId,$author,$comment)
{
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
{   $report = $this->report->reportComment($_GET['id']);
    header('Location: index.php?action=post&id='.$_GET['postId']);
}
}
