<?php
class FrontController
{
  // Appel PostManager et sa méthode de recup des 2 derniers posts
  public function home()
  {
      $postManager = new PostManager();
      $lastPost = $postManager->getLastPost();
      require('view/HomeView.php');
  }
  // Appel postManager et sa methode de recup de TOUS les posts
  public function allPosts()
  {
      $postManager = new PostManager();
      $posts = $postManager->getAllPosts();
      require('view/PostsView.php');
  }
  // Appel PostManager et sa methode de recup de 1 post
  // Appel CommentManager et sa methode commentaires associés à ce post
public function onepost()
{
    $postManager = new PostManager();
    $post = $postManager->getOnePost($_GET['id']);
  //  $post = $this->post->getOnePost($postId);
    // Affiche les commentaires en fonction du post
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($_GET['id']);
    //$comments = $this->comment->getComments($postId);
    require('view/postView.php');
}
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
