<?php
class PostManager extends Manager
{
  public function getAllPosts()
  {
      $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\' )AS creation_date FROM posts ORDER BY id DESC');
      while($donnees = $req->fetch(PDO::FETCH_ASSOC))
      {
        $posts[] = new Post($donnees);
      }
      return $posts;
  }

  public function getLastPost()
  {
      $req = $this->db()->query('SELECT id,author,title,content,DATE_FORMAT(creation_date,\'%d/%m/%Y à %Hh%i\')AS creation_date FROM posts ORDER BY id DESC LIMIT 0,4');
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
    $onePost = new Post($donnees);
    return $onePost;
  }

  public function createPost(Post $post)
  {
      $req = $this->db()->prepare('INSERT INTO posts(author,title,content,creation_date) VALUES(:author , :title , :content, NOW())');
      $req->bindValue( ':author', $post->getauthor());
      $req->bindValue( ':title', $post->getTitle());
      $req->bindValue( ':content', $post->getContent());
      $req->execute();
  }

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

  public function updateModifyPost($postId)
  {
      $req = $this->db()->prepare('SELECT id, title, author,content FROM posts WHERE id= ?');
      $req->execute(array($postId));
      $post = $req->fetch();
      return $post;
  }

  public function deletePost($postId)
  {
      $req = $this->db()->prepare('DELETE FROM posts WHERE id= ?');
      $req->execute(array($postId));
      return $req;
  }

  public function countPosts()
  {
    $req = $this->db()->prepare('SELECT COUNT(*) FROM posts');
    $req->execute();
    $datas = $req->fetchAll();
    $req->closeCursor();
    return $datas[0];
  }

}
