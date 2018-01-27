<?php
class PostManager extends Manager
{
  public function getAllPosts() // OK
  {
      $posts = [];
      $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\' )AS creation_date FROM posts ORDER BY id DESC ');
      while($donnees = $req->fetch(PDO::FETCH_ASSOC))
      {
        $posts[] = new Post($donnees);
      }
      return $posts;
  }
  public function getLastPost() // OK
  {
    $lastPost = [];
    $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date FROM posts ORDER BY creation_date DESC LIMIT 0,4');
    while($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $lastPost[] = new Post($donnees);
    }
    return $lastPost;
  }
  public function getOnePost($postId)
  {
      $req = $this->db()->prepare('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date FROM posts WHERE id='.$postId);
      $req->execute(array($postId));
      $donnees = $req->fetch();
      $Onepost = new Post($donnees);
      return $Onepost;
  }
  public function createPost(Post $post) // OK
  {
      $req = $this->db()->prepare('INSERT INTO posts(author,title,content,creation_date) VALUES(:author , :title , :content, NOW())');
      $req->bindValue( ':author', $post->getauthor());
      $req->bindValue( ':title', $post->getTitle());
      $req->bindValue( ':content', $post->getContent());
      $req->execute();
  }
  public function updatePost(Post $post)
  {
        $req = $this->db()->prepare('UPDATE posts SET author = :author, title = :title, content = :content WHERE id= :id');
        $req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
        $req->bindValue(':author', $post->getAuthor());
        $req->bindValue(':title',$post->getTitle());
        $req->bindValue(':content', $post->getAuthor());
        $req->execute();
     }
     public function updateModifyPost($postId)// ok ne pas toucher
      {
            $req = $this->db()->prepare('SELECT id, title, author,content FROM posts WHERE id='.$postId);
            $req->execute(array($postId));
            $donnees = $req->fetch();
            $post = new Post($donnees);
            return $post;
      }
    public function deletePost($postId)
    {
        $req = $this->db()->prepare('DELETE FROM posts WHERE id= ?');
        $req->execute(array($postId));
        return $req;
    }
}
