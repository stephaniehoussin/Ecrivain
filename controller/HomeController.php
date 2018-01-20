<?php
class HomeController
{
  // Appel PostManager et sa méthode de recup des 2 derniers posts
  public function Home()
  {
      $postManager = new PostManager();
      $lastPost = $postManager->getLastPost();
      require('view/HomeView.php');
  }
}
 ?>
