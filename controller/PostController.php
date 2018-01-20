<?php
class PostController
{
  // Appel postManager et sa methode de recup de TOUS les posts
  public function AllPosts()
  {
      $postManager = new PostManager();
      $posts = $postManager->getAllPosts();
      require('view/PostsView.php');
  }
  // Appel PostManager et sa methode de recup de 1 post
  // Appel CommentManager et sa methode commentaires associés à ce post
public function post()
{
    $postManager = new PostManager();
    $post = $postManager->getOnePost($_GET['id']);

    // Affiche les commentaires en fonction du post
    $commentManager = new CommentManager();
    $comments = $commentManager->getComments($_GET['id']);
    require('view/postView.php');
}
}
?>
