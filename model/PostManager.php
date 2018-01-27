<?php
class PostManager extends Manager
{
  // READ
  // récupère tous les derniers billets
  public function getAllPosts() // OK
  {
      $posts = [];
      $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\' )AS creation_date_fr FROM posts ORDER BY id DESC ');
      while($donnees = $req->fetch(PDO::FETCH_ASSOC))
      {
        $posts[] = new Post($donnees);
      }
      return $posts;
  }
  // READ
  // récupère les deux derniers Posts
  public function getLastPost() // OK
  {
    $lastPost = [];
    $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date_fr FROM posts ORDER BY creation_date_fr DESC LIMIT 0,4');
    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $lastPost[] = new Post($donnees);
    }
    return $lastPost;
  }
  // READ
  // récupère 1 post précis
  // Récupère en paramètres les infos dont on a besoin
  public function getOnePost($id)
  {
      //$postId = (int) $postId;
      $req = $this->db()->prepare('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date_fr FROM posts WHERE id= ?');
      $req->execute(array($id));
      $donnees = $req->fetch();
      $Onepost = new Post($donnees);
      return $Onepost;
  }
  // recuperer le dernier billet posté pour page Accueil

  // CREATE billet
  // Récupère en paramètres les infos dont on a besoin
  public function createPost(Post $post) // OK
  {
      $req = $this->db()->prepare('INSERT INTO posts(author,title,content,creation_date) VALUES(:author , :title , :content, NOW())');
      $req->bindValue( ':author', $post->getauthor());
      $req->bindValue( ':title', $post->getTitle());
      $req->bindValue( ':content', $post->getContent());
      $req->execute();
  }
    // DELETE billet
    // Récupère en paramètres les infos dont on a besoin
    public function deletePost($postId)
    {   // delete billet et SES comms associés
        $req = $this->db()->prepare('DELETE FROM posts WHERE id= ?');
        $req->execute(array($postId));
        return $req;
    }
  //UPDATE billet
  // Récupère en paramètres les infos dont on a besoin
  public function updatePost(Post $post)
  {
        $req = $this->db()->prepare('UPDATE posts SET author = :author, title = :title, content = :content WHERE id= :id');
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $req->bindValue(':author', $post->getAuthor());
        $req->bindValue(':title',$post->getTitle());
        $req->bindValue(':content', $post->getAuthor());
        $req->execute();
     }
     // Récupère en paramètres les infos dont on a besoin
     public function updateModifyPost($postId)
      {
            $req = $this->db()->prepare('SELECT id, title, author,content FROM posts WHERE id= ?');
            $req->execute(array($postId));
            $post = $req->fetch();
            return $post;
      }
}
