<?php
// Rôle -> Manager -> effectuer opérations de lecture ecriture sur les tables
// Le CRUD
class PostManager extends Manager
{
  // READ
  // récupère tous les derniers billets
  public function getAllPosts()
  {
      $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\' )AS creation_date_fr FROM posts ORDER BY id DESC ');
      return $req;
  }
  // READ
  // récupère les deux derniers Posts
  public function getLastPost()
  {
    $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date_fr FROM posts ORDER BY creation_date_fr DESC LIMIT 0,4');
    return $req;
  }
  // READ
  // récupère 1 post précis
  // Récupère en paramètres les infos dont on a besoin
  public function getOnePost($postId)
  {
      $req = $this->db()->prepare('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date_fr FROM posts WHERE id= ?');
      $req->execute(array($postId));
      $post = $req->fetch();
      return $post;
  }
  // recuperer le dernier billet posté pour page Accueil

  // CREATE billet
  // Récupère en paramètres les infos dont on a besoin
  public function CreatePost($author,$title,$content)
  {
      $req = $this->db()->prepare('INSERT INTO posts(author,title,content,creation_date) VALUES(?, ?, ?, NOW())');
      $req->bindValue( 1, $author, PDO::PARAM_STR);
      $req->bindValue( 2, $title, PDO::PARAM_STR);
      $req->bindValue( 3, $content, PDO::PARAM_STR);
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
  public function updatePost($author, $title, $content, $id)
  {
        $req = $this->db()->prepare('UPDATE posts SET author = :author, title = :title, content = :content WHERE id= :id');
        $req->execute(array(
          'author' =>$author,
          'title' =>$title,
          'content' =>$content,
          'id' =>$id
        ));
        $req->closeCursor();
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
 ?>
