<?php
class Comment
{
  private $id;
  private $postId;
  private $author;
  private $comment;
  private $comment_date;
  private $is_signaled;

public function __construct($donnees = [])
{
  if(!empty($donnees)) // si on a specifie des valeurs alors on hydrate l objet
  {
    $this->hydrate($donnees);
  }
}

public function hydrate(array $donnees)
{
  foreach($donnees as $key => $value)
  {
    $method = 'set'.ucfirst($key);
    if(method_exists($this, $method))
    {
      $this->$method($value);
    }
  }
}
  //getters

  public function getId()
  {
    return $this->id;
  }
  public function getPostId()
  {
    //$postId = (int) $postId;
    return $this->postId;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function getComment_date()
  {
    return $this->comment_date;
  }
  public function getIs_signaled()
  {
    return $this->is_signaled;
  }
  public function getDonnees()
  {
    return $this->donnees;
  }
  // setters
  public function setId($id)
  {
      $this->id = $id;
  }
  public function setPostId($postId)
  {

    $this->postId = $postId;
  }
  public function setAuthor($author)
  {
    if(is_string($author) AND !empty($author))
    {
      $this->author = $author;
    }
  }
  public function setComment($comment)
  {
    if(is_string($comment) AND !empty($comment))
    {
      $this->comment = $comment;
    }
  }
  public function setComment_date($comment_date)
  {
    $this->comment_date = $comment_date;
  }
  public function setIs_signaled($is_signaled)
  {
    $this->is_signaled = $is_signaled;
  }
  public function setDonnees(array $donnees)
  {
    $this->donnees = $donnees;
  }

}
