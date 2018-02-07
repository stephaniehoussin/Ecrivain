<?php
class Post
{
  private $id;
  private $author;
  private $title;
  private $content;
  private $creation_date;

  public function __construct($donnees = [])
  {
    if(!empty($donnees))
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

  public function getId()
  {
    return $this->id;
  }
  public function getAuthor()
  {
    return $this->author;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function getContent()
  {
    return $this->content;
  }
  public function getCreation_date()
  {
    return $this->creation_date;
  }
  public function getDonnees()
  {
    return $this->donnees;
  }

  public function setId($id)
  {
      $id = (int) $id;
      if($id > 0)
      {
          $this->id =  $id;
      }
  }
  public function setAuthor($author)
  {
     if(is_string($author))
     {
       $this->author = $author;
     }
  }
  public function setTitle($title)
  {
      if(is_string($title))
      {
          $this->title = $title;
      }
  }
  public function setContent($content)
  {
      if(is_string($content))
      {
        $this->content = $content;
      }
  }
  public function setCreation_date($creation_date)
  {
    $this->creation_date = $creation_date;
  }
  public function setDonnees(array $donnees)
  {
    $this->donnees = $donnees;
  }
}
